<?php 
  ob_start();
  session_start();
  include'admin/db_connect.php';
?>
<html>
<head>
    <title>BLUELIGHT</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/categories.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/tshirt.css">
    <link rel="stylesheet" href="../css/cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');
        </style>
        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
            <li class="dropdown">
               <a href="#" class="dropbtn">Upload</a>
               <div class="dropdown-content">
                 <a href="c-tshirt.php">T-shirt</a>
                 <a href="hoodie.php">Hoodie</a>
                 <a href="mug.php">Mug</a>
                 <a href="cap.php">Cap</a>
                 <a href="towel.php">Towel</a>
                 <a href="pillow.php">Pillow</a>
                 <a href="pillowcover.php">Pillow-Cover</a>
               </div>
           </li>
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
                UPLOAD YOUR CUSTOM IMAGE HERE<br>
                <div class="image">
                    <label for="image" class="control-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="displayImg(this,$(this))" />
                    <img src="" alt="" id="cimg" style="margin-top: 30px;margin-left: -50px;">
                    <button type="button" class="btn btn-sm btn-primary col-sm-3 offset-md-3" onclick="saveImage()">Save</button>
                </div>
            </div>
            <div class="detail">
                <div class="product1">
                    <h1 class="title">CUSTOM T-SHIRT</h1>
                    <p>Customized T-shirt For Both Men And Women</p>
                    <hr>
                    <h1>MRP-₹599</h1>
                    <p>Inclusive of all taxes</p>
                    <hr>
                    <h1>SIZE</h1>
                    <a href="#" onclick="">size chart and how to measure</a>
                    <br><br><label class="radio"><input type="radio" name="size" value="S"> <span>S</span></label> 
                    <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label>
                    <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> 
                    <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> 
                    <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                    <div class="text-center">
          	            <button class="btn btn-outline-dark btn-sm btn-block" id="add_to_cart_modal"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                    </div>
                    <div class="row">
          	<div class="col-md-2"><label class="control-label">Qty</label></div>
          	<div class="input-group col-md-7 mb-3">
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-secondary" type="button" id="qty-minus"><span class="fa fa-minus"></button>
			  </div>
			  <input type="number" readonly value="1" min = 1 class="form-control text-center" name="qty" >
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-dark" type="button" id="qty-plus"><span class="fa fa-plus"></span></button>
			  </div>
			</div>
          </div>
                </div>
            </div>
        </div>
      <div class="description">
        <h1>PRODUCT DESCRIPTION</h1>
        <ul>
            <li>Material: Our t-shirts are made from high-quality materials that feel soft and comfortable against the skin, ensuring maximum comfort and durability.</li>
            <li>Printing: Our t-shirts feature vibrant, long-lasting designs that are printed using the latest printing technology, ensuring a high-quality finish that won't fade or peel easily. Choose from a range of customization options, including color, font, and graphics, to create a unique design that reflects your personality and style.</li>
            <li>Size: We offer a variety of sizes to cater to different body types, and our accurate sizing information helps you make informed decisions when selecting your size. </li>
            <li>Return: If for any reason you're not satisfied with your product, you can return it to us within 10 days of the delivery date. Please note that the product must be in its original condition with no signs of wear or damage.</li>
        </ul>
        <img src="../img/quality.png" width="300px" height="350px">
        <img src="../img/price.png" width="300px" height="350px">
        <img src="../img/easyreturn.png" width="300px" height="350px">
        </div>
</div>
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

    function saveImage() {
    // Retrieve the uploaded image data
    var image = document.getElementById('image').files[0];

    // Create a FormData object and add the image data to it
    var formData = new FormData();
    formData.append('image', image);

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the callback function for when the request completes
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert('Image saved successfully!');
        }
    }

    // Open the request and specify the PHP script to receive the image data
    xhr.open('POST', 'save_image.php', true);

    // Send the request with the image data
    xhr.send(formData);
}

  </script>
    <script src="../js/header.js"></script>
    <script src="../js/qty.js"></script> 
    
</body>

</html>