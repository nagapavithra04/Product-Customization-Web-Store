<?php ob_start(); ?>
<?php 
  session_start();
  include('header.php');
  include'admin/db_connect.php';
  $qry1= $conn->query("SELECT * FROM  custom_image where id = ".$_GET['id'])->fetch_array();
  $qry = $conn->query("SELECT * FROM  custom_product_list where id = ".$_GET['cat_id'])->fetch_array();
?>
<html>
<head>
    <title>BLUELIGHT</title>
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
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true" style="float: right;">
               <div class="toast-body text-white">
               </div>
            </div>
    <div id="t1" style="position: absolute; z-index: 5;">
    <div class="container">
            <div class="image">
            <h1 style="margin-top: 20px;margin-left: -60px;font-size:40px;">Bluelight's<?php echo $qry['name'] ?> </h1>
            <img src="<?php echo $qry1['img_path']?>"  alt="..." width="470px" height="470px"style="margin-top: 30px;margin-left: -50px;" >
            </div>
            <div class="detail">
                <div class="product1">
                    <h1 class="title"><?php echo $qry['name'] ?></h1>
                    <p><?php echo $qry['description'] ?></p>
                    <hr>
                    <h1>MRP-₹<?php echo $qry['price'] ?></h1>
                    <p>Inclusive of all taxes</p>
                    <hr>
                    <h1>ABOUT</h1>
<table class="table1">
  <tr>
  <td>Category</td>
  <td>Pillow Cover</td>
  </tr>
  <tr>
  <td>Material</td>
  <td>Cotton</td>
  </tr>
  <tr>
  <td>Size</td>
  <td>Standard</td>
  </tr>
  <tr>
  <td>Special Feature</td>
  <td>Hidden zipper, Machine washable</td>
  </tr>
  <tr>
  <td>Net Quantity</td>
  <td>1 count</td>
  </tr>
</table>
<div class="row">
          	<div class="col-md-2"><label class="control-label"><br><br>QTY</label></div>
          	<div class="input-group col-md-7 mb-3" style="margin-top:41px;">
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-secondary" type="button" id="qty-minus" style="height: 30px;margin-top:19px;margin-right:2px;"><span class="fa fa-minus"></button>
			  </div>
			  <input type="number" readonly value="1" min = 1 class="form-control text-center" name="qty" >
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-dark" type="button" id="qty-plus" style="height: 30px;margin-top:19px;margin-left:1px;"><span class="fa fa-plus"></span></button>
			  </div>
			</div>
          </div>
                </div><br>
                    <div class="text-center">
          	            <button class="btn btn-outline-dark btn-sm btn-block" id="add_to_cart_modal"style="margin-left: 90px;width:360px;height:30px;"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                    </div>
                    
            </div>
        </div>
      <div class="description">
      <h1>PRODUCT DESCRIPTION</h1>
<ul>
    <li>Stylish and versatile pillow cover made from high-quality materials</li>
    <li>Soft and durable fabric provides a comfortable and long-lasting cover for your pillow</li>
    <li>Easy-to-use zipper closure ensures a secure fit and easy removal for washing</li>
    <li>Machine washable for convenient maintenance</li>
    <li>Can be used to update the look of an existing pillow or to protect a new pillow from wear and tear</li>
    <li>Return: If for any reason you're not satisfied with your product, you can return it to us within 10 days of the delivery date. Please note that the product must be in its original condition with no signs of wear or damage.</li>
</ul>
        <img src="../img/quality.png" width="300px" height="350px">
        <img src="../img/price.png" width="300px" height="350px">
        <img src="../img/easyreturn.png" width="300px" height="350px">
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
  $('#add_to_cart_modal').click(function(){
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=add_to_cart',
			method:'POST',
			data:{pid:'<?php echo $_GET['id'] ?>',qty:$('[name="qty"]').val(),customize:1,size: 'Standard'},
			success:function(resp){
				if(resp == 1 )
					alert_toast("Order successfully added to cart");
					$('.item_count').html(parseInt($('.item_count').html()) + parseInt($('[name="qty"]').val()))
					$('.modal').modal('hide')
					end_load()
			}
		})
	})
	$('#qty-minus').click(function(){
		var qty = $('input[name="qty"]').val();
		if(qty == 1){
			return false;
		}else{
			$('input[name="qty"]').val(parseInt(qty) -1);
		}
	})
	$('#qty-plus').click(function(){
		var qty = $('input[name="qty"]').val();
			$('input[name="qty"]').val(parseInt(qty) +1);
	})
	
</script>

</body>

</html>