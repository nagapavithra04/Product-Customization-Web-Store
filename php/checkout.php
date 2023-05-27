<?php ob_start(); ?>
<?php 
  session_start();
  include('header.php');
  include ('admin/db_connect.php');
  // var_dump($_SESSION);
  $chk = $conn->query("SELECT * FROM cart where user_id = {$_SESSION['login_userid']} ")->num_rows;
  if($chk <= 0){
      echo "<script>alert('You don\'t have an Item in your cart yet.'); location.replace('./')</script>";
  }
  ?>
<html>
<head>
    <title>BLUELIGHT</title>
    
</head>
<body style="background-color: rgba(0, 0, 0, 0.125)">
<div>
      <header>
		<nav class="navigation">
			<!-- Logo -->
			<div class="logo">
            <img src="../img/bluelight.png" style="width: 130px;height: 130px; margin-left: 20px;">
			</div>
			
			<!-- Navigation -->
			<ul class="menu-list">
            <li><a href="home.php">Home</a></li>
            <li><a href="custombuilt.php">Customize</a></li>
            <li><a href="c-tshirt.php">Upload</a></li>
            <li><a href="category.php">Categories</a></li>
            <li><a href="cart.php"><span><i class="fa fa-shopping-cart"></i>  </span>Cart</a></li>
            <li><a href="Profile.php">Profile</a></li>
			</ul>
			<div class="humbarger">
				<div class="bar"></div>
				<div class="bar2 bar"></div>
				<div class="bar"></div>
			</div>
		</nav>
      </header>
      </div>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true" style="float: right;">
               <div class="toast-body text-white">
               </div>
            </div>
 
    <div class="container2">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm" style="font-size: large;font-weight: bold;  font-family: 'Times New Roman', Times, serif;">
                    <h1>Confirm Delivery Information</h1>
                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="name" required="" class="form-control" value="<?php echo $_SESSION['login_username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_useremail'] ?>">
                    </div>  
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_userphoneno'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_useraddress'] ?></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-block btn-outline-dark">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    
    window.start_load = function(){
  $('body').prepend('<di id="preloader2"></di>')
}
window.end_load = function(){
  $('#preloader2').fadeOut('fast', function() {
      $(this).remove();
    })
}

   window.uni_modal = function($title = '' , $url=''){
  start_load()
  $.ajax({
      url:$url,
      error:err=>{
          console.log()
          alert("An error occured")
      },
      success:function(resp){
          if(resp){
              $('#uni_modal .modal-title').html($title)
              $('#uni_modal .modal-body').html(resp)
              $('#uni_modal').modal('show')
              end_load()
          }
      }
  })
}
window.uni_modal_right = function($title = '' , $url=''){
  start_load()
  $.ajax({
      url:$url,
      error:err=>{
          console.log()
          alert("An error occured")
      },
      success:function(resp){
          if(resp){
              $('#uni_modal_right .modal-title').html($title)
              $('#uni_modal_right .modal-body').html(resp)
              $('#uni_modal_right').modal('show')
              end_load()
          }
      }
  })
}
window.load_cart = function(){
  $.ajax({
    url:'admin/ajax.php?action=get_cart_count',
    success:function(resp){
      if(resp > -1){
        resp = resp > 0 ? resp : 0;
        $('.item_count').html(resp)
      }
    }
  })
}
$('#login_now').click(function(){
  uni_modal("LOGIN",'login.php')
})
$(document).ready(function(){
  load_cart()
})
window.alert_toast= function($msg = 'TEST',$bg = 'success'){
    $('#alert_toast').removeClass('bg-success')
    $('#alert_toast').removeClass('bg-danger')
    $('#alert_toast').removeClass('bg-info')
    $('#alert_toast').removeClass('bg-warning')

  if($bg == 'success')
    $('#alert_toast').addClass('bg-success')
  if($bg == 'danger')
    $('#alert_toast').addClass('bg-danger')
  if($bg == 'info')
    $('#alert_toast').addClass('bg-info')
  if($bg == 'warning')
    $('#alert_toast').addClass('bg-warning')
  $('#alert_toast .toast-body').html($msg)
  $('#alert_toast').toast({delay:3000}).toast('show');
}
$('#checkout-frm').submit(function(e){
  start_load()
  $.ajax({
    url: 'admin/ajax.php?action=save_order',
    type:'POST',
    data: $(this).serialize(),
    error:err=>{
				console.log(err)

			},
    success:function(resp){
        if(resp){
            alert_toast("Order successfully Placed.")
            setTimeout(function(){
                location.replace('home.php?page=home')
            })
        }
    }
  })
})
    </script>
    </body>
    </html>