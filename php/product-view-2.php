<?php ob_start(); ?>
<?php 
  session_start();
  include('header.php');
  include'admin/db_connect.php';
    $qry = $conn->query("SELECT * FROM  product_list where id = ".$_GET['id'])->fetch_array();
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
            <h1 style="margin-top: 20px;margin-left: -60px;font-size:40px;">Trendy Hoodie</h1>
            <img src="assets/img/<?php echo $qry['img_path'] ?>"  alt="..." width="470px" height="470px"style="margin-top: 30px;margin-left: -50px;" >

            </div>
            <div class="detail">
                <div class="product1">
                    <h1 class="title"><?php echo $qry['name'] ?></h1>
                    <p><?php echo $qry['description'] ?></p>
                    <hr><br>
                    <h1>MRP-₹<?php echo $qry['price'] ?></h1>
                    <p>Inclusive of all taxes</p>
                    <hr><br>
                    <h1>SIZE</h1>
                    <br><select name="size" id="size" required>
                                <option value="">--Please select--</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
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
            <li>Material: Our Hoodies are made from high-quality materials that feel soft and comfortable against the skin, ensuring maximum comfort and durability.</li>
            <li>Printing: Our Hoodie's feature vibrant, long-lasting designs that are printed using the latest printing technology, ensuring a high-quality finish that won't fade or peel easily. Choose from a range of customization options, including color, and designs, to create a unique design that reflects your personality and style.</li>
            <li>Size: We offer a variety of sizes to cater to different body types, and our accurate sizing information helps you make informed decisions when selecting your size. </li>
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
			data:{pid:'<?php echo $_GET['id'] ?>',qty:$('[name="qty"]').val(),customize:0,size:$('[name="size"]').val()},
			success:function(resp){
				if(resp == 1 )
					alert_toast("Order successfully added to cart");
					$('.item_count').html(parseInt($('.item_count').html()) + parseInt($('[name="qty"]').text()))
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