<html>
<head>
    <title>BLUELIGHT</title>
    <?php
    session_start();
    include('header.php');
    ?>
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
    <div id="t1" style="position: absolute; z-index: 5;">
    <div class="container">
             <div class="image" style="margin-top: 2px;margin-left: 40px;font-size: 20px">
                         <form action="" id="manage-menu">
                           <div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div>
                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                         </form>
                         <img id="cimg" src="<?php echo isset($row['img_path']) ? '../assets/img/'.$row['img_path'] :'' ?>" width="470px" height="470px"  style="margin-top: 60px;margin-left: -50px;" /> 
             </div>
            <div class="detail">
                <div class="product1">
                    <h1 class="title">T-SHIRT ALWAYS LOOK COOL</h1>
                    <p>tshirt for both men and women</p>
                    <hr>
                    <h1>MRP-₹399(20% OFF)</h1>
                    <p>Inclusive of all taxes</p>
                    <hr>
                    <h1>SIZE</h1>
                    <a href="#" onclick="">size chart and how to measure</a>
                    <br><br><label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span>
                    </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label>
                    <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label
                        class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label
                        class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                    <br><br><button class="button" type="submit" name="add" id="add_to_cart_modal">Add to cart</button>
                    <form id="qtyform">
                      <label for="quantity1" class="qty">Quantity:</label>
                      <div class="quantity-box">
                      <button id="qtybutton" type="button" class="quantity1-minus">-</button>
                      <input type="number" id="quantity" name="quantity" readonly value="1" min="1">
                      <button id="qtybutton" type="button" class="quantity1-plus">+</button>
                      </div>
                    </form>

                </div>
            </div>
        </div>
      <div class="description">
        <h1>PRODUCT DESCRIPTION</h1>
        <ul>
            <li>Material: Our custom t-shirts are made from high-quality materials that feel soft and comfortable against the skin, ensuring maximum comfort and durability.</li>
            <li>Printing: Our t-shirts feature vibrant, long-lasting designs that are printed using the latest printing technology, ensuring a high-quality finish that won't fade or peel easily. Choose from a range of customization options, including color, font, and graphics, to create a unique design that reflects your personality and style.</li>
            <li>Size: We offer a variety of sizes to cater to different body types, and our accurate sizing information helps you make informed decisions when selecting your size. </li>
            <li>Return: If for any reason you're not satisfied with your custom t-shirt, you can return it to us within 5 days of the delivery date. Please note that the t-shirt must be in its original condition with no signs of wear or damage.</li>
        </ul>
        <img src="../img/quality.png" width="300px" height="350px">
        <img src="../img/price.png" width="300px" height="350px">
        <img src="../img/easyreturn.png" width="300px" height="350px">
        </div>
    </div>
    <style>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset !important;
	}
	.custom-switch,.custom-control-input,.custom-control-label{
		cursor:pointer;
	}
	b.truncate {
		 overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; 
   -webkit-box-orient: vertical;	
    font-size: small;
    color: #000000cf;
    font-style: italic;
}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-image').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_image',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	function delete_menu($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_menu',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>   
</body>

</html>