<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM `users` where username = '".$username."' ");
		if($qry->num_rows > 0){
			$result = $qry->fetch_array();
			$is_verified = password_verify($password, $result['password']);
			if($is_verified){
			foreach ($result as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
			}
		}
			return 3;
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM user where useremail = '".$email."' ");
		if($qry->num_rows > 0){
			$result = $qry->fetch_array();
			$is_verified = password_verify($password, $result['userpassword']);
			if($is_verified){
				foreach ($result as $key => $value) {
					if($key != 'userpassword' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
				$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_userid']."' where client_ip ='$ip' ");
					return 1;
			}
		}
			return 3;
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$data = " `name` = '$name' ";
		$data .= ", `username` = '$name' ";
		$data .= ", `password` = '$password' ";
		$data .= ", `type` = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$data = " username = '$name' ";
		$data .= ", useremail = '$email' ";
		$data .= ", userpassword = '$password' ";
		$data .= ", useraddress = '$address' ";
		$data .= ", userphoneno = '$phoneno' ";
		$chk = $this->db->query("SELECT * FROM user where useremail = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO user set ".$data);
		if($save){
			$login = $this->login2();
			return 1;
		}
	}
	function save_settings(){
		extract($_POST);
		$data = " username = '$name' ";
		$data .= ", useremail = '$email' ";
		$data .= ", userphoneno = '$phoneno' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if($_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
		$data .= ", img_path = '$fname' ";
  
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function save_customs(){
		extract($_POST);
		$data = " name = '$name' ";
		if($_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
		$data .= ", img_path = '$fname' ";
  
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO custom_built set ".$data);
		}else{
			$save = $this->db->query("UPDATE custom_built set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_custom_product(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", custom_category_id = '$custom_category_id' ";
		$data .= ", description = '$description' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO custom_product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE custom_product_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_custom_product(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM custom_product_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_image(){
		extract($_POST);
		if(isset($_SESSION['login_userid'])){
			$data .= ", user_id = '".$_SESSION['login_userid']."' ";	
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$data .= ", client_ip = '".$ip."' ";	

		}
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO custom_image set ".$data);
		}else{
			$save = $this->db->query("UPDATE custom_image set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_image(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM custom_image where id = ".$id);
		if($delete)
			return 1;
	}
	function save_menu(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";

		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_menu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		if($delete)
			return 1;
	}
    
	function delete_cart(){
		extract($_GET);
		$delete = $this->db->query("DELETE FROM cart where id = ".$id);
		if($delete)
			header('location:'.$_SERVER['HTTP_REFERER']);
	}
	function add_to_cart(){
		extract($_POST);
		$data = " product_id = $pid ";	
		$qty = isset($qty) ? $qty : 1 ;
		$data .= ", qty = $qty ";
		$data .= ", customize = $customize ";
		$data .= ", size = '$size' ";
		if(isset($_SESSION['login_userid'])){
			$data .= ", user_id = '".$_SESSION['login_userid']."' ";	
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$data .= ", client_ip = '".$ip."' ";	

		}
		$save = $this->db->query("INSERT INTO cart set ".$data);
		if($save)
			return 1;
	}
	function get_cart_count(){
		extract($_POST);
		if(isset($_SESSION['login_userid'])){
			$where =" where user_id = '".$_SESSION['login_userid']."'  ";
		}
		else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$where =" where client_ip = '$ip'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart ".$where);
		if($get->num_rows > 0){
			return $get->fetch_array()['cart'];
		}else{
			return '0';
		}
	}

	function update_cart_qty(){
		extract($_POST);
		$data = " qty = $qty ";
		$save = $this->db->query("UPDATE cart set ".$data." where id = ".$id);
		if($save)
		return 1;	
	}

	function save_order(){
		extract($_POST);
		$data = " name = '$name'";
		$data .= ", address = '$address' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", email = '$email' ";
		$save = $this->db->query("INSERT INTO orders set ".$data);
		if($save){
			$id = $this->db->insert_id;
			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_userid']);
			while($row= $qry->fetch_assoc()){
					$data = " order_id = '$id' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					$data .= ", size = '".$row['size']."' ";
					$data .=",customize='".$row['customize']."'";
					$save2=$this->db->query("INSERT INTO order_list set ".$data);
					if($save2){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
						if($row['customize']==1){
							$this->db->query("UPDATE custom_image set status=1 where id= ".$row['product_id']);
						}
					}
			}
			return 1;
		}
	}
function confirm_order(){
	extract($_POST);
		$save = $this->db->query("UPDATE orders set status = 1 where id= ".$id);
		if($save)
			return 1;
}

}