
<?php
    session_start();
    include('admin/db_connect.php');
    ?>
<html>
<head>
    <title>BLUELIGHT</title>
	<link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/categories.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/tshirt.css">
    <link rel="stylesheet" href="../css/cart.css">

	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    
</head>
<body>
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
    <div id="cart">
    <section class="page-section" id="menu">
        <div class="container1" style="font-size: large;">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky">
	        		<div class="card">
	        			<div class="card-body">
	        				<div class="row">
		        				<div class="col-md-8"><b>Items</b></div>
		        				<div class="col-md-4 text-right"><b>Total</b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
				<?php 
				$total = 0;?>
				<div>
        		<?php 
        		if(isset($_SESSION['login_userid'])){
					$data = "and c.user_id = '".$_SESSION['login_userid']."' and c.customize=0 ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total1 = 0;
				$get = $conn->query("SELECT *,c.id as cid FROM cart c ,product_list p where
				 p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total1 += ($row['qty'] * $row['price']);
        		?>

        		<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4 d-flex align-items-center" style="text-align: -webkit-center">
								<div class="col-auto">	
			        				<a href="admin/ajax.php?action=delete_cart&id=<?php echo $row['cid'] ?>" class="rem_cart btn btn-sm btn-outline-danger" data-id="<?php echo $row['cid'] ?>"><i class="fa fa-trash"></i></a>
								</div>	
								<div class="col-auto flex-shrink-1 flex-grow-1 text-center">	
			        				<img src="assets/img/<?php echo $row['img_path'] ?>" alt="" width="170px" height="170px">
								</div>	
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row['name'] ?></large></b></p>
			        			<p class='truncate'> <b><small>Desc :<?php echo $row['description'] ?></small></b></p>
			        			<p> <b><small>Unit Price :<?php echo number_format($row['price'],2) ?></small></b></p>
								<p class='truncate'> <b><small>SIZE :<?php echo $row['size'] ?></small></b></p>
			        			<p><small>QTY :</small></p>
			        			<div class="input-group mb-3">	  
								  <input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								</div>
			        		</div>
			        		<div class="col-md-4 text-right">
			        			<b><large><?php echo number_format($row['qty'] * $row['price'],2) ?></large></b>
			        		</div>
		        		</div>
	        		</div>
	        	</div>
				<?php endwhile; ?>
				</div>
				<div>
				<?php
				if(isset($_SESSION['login_userid'])){
					$data = "and c.user_id = '".$_SESSION['login_userid']."' and c.customize=1 ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total2 = 0;
				$get1 = $conn->query("SELECT *,c.id as cid FROM cart c,custom_image ci,custom_product_list p where ci.id = c.product_id and ci.custom_product_id=p.id ".$data);

				while($row1= $get1->fetch_assoc()):
					$total2 += ($row1['qty'] * $row1['price']);
				?>
				
				<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4 d-flex align-items-center" style="text-align: -webkit-center">
								<div class="col-auto">	
			        				<a href="admin/ajax.php?action=delete_cart&id=<?php echo $row1['cid'] ?>" class="rem_cart btn btn-sm btn-outline-danger" data-id="<?php echo $row1['cid'] ?>"><i class="fa fa-trash"></i></a>
								</div>	
								<div class="col-auto flex-shrink-1 flex-grow-1 text-center">	
			        				<img src="<?php echo $row1['img_path'] ?>" alt="" width="170px" height="170px">
								</div>	
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row1['name'] ?></large></b></p>
			        			<p class='truncate'> <b><small>Desc :<?php echo $row1['description'] ?></small></b></p>
			        			<p> <b><small>Unit Price :<?php echo number_format($row1['price'],2) ?></small></b></p>
								<p class='truncate'> <b><small>SIZE :<?php echo $row1['size'] ?></small></b></p>
			        			<p><small>QTY :</small></p>
			        			<div class="input-group mb-3">	  
								  <input type="number" readonly value="<?php echo $row1['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								</div>
			        		</div>
			        		<div class="col-md-4 text-right">
			        			<b><large><?php echo number_format($row1['qty'] * $row1['price'],2) ?></large></b>
			        		</div>
		        		</div>
	        		</div>
	        	</div>
			<?php endwhile; ?>
			</div>
			 <?php
			 $total = $total1 + $total2;
			 ?>
        	</div>
        	<div class="col-md-4">
        		<div class="sticky">
        			<div class="card">
        				<div class="card-body">
        					<p><large>Total Amount (Tax + Shipping Price Included)</large></p>
        					<hr>
        					<p class="text-right"><b><?php echo number_format($total,2)?></b></p>
        					<hr>
        					<div class="text-center">
        						<button class="btn btn-block btn-outline-dark" type="button" id="checkout">Proceed to Checkout</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
    </section>
</div>
    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
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
    })}
	$('.view_prod').click(function(){
            uni_modal_right('Product','product-view.php?id='+$(this).attr('data-id'))
        })
		$('#checkout').click(function(){
			
			if('<?php echo isset($_SESSION['login_userid']) ?>'){
				location.replace("checkout.php")
			}else{				
				uni_modal("Checkout","login.php?page=checkout")
			}
		})
    </script>
    
</body>

</html>