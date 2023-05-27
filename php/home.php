
<html>
<head>
    <title>BLUELIGHT</title>
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');
    ?>
   <script src="../js/fabric.min.js"></script>
    <script src="../js/colors.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/download.js"></script>
    <script src="../js/qty.js"></script>   

</head>

<body >
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
    <div id="homepg">
        <img class="homeimg" src="../img/1.jpg">
        <img class="homeimg1" src="../img/2.jpg">
        <img class="homeimg1" src="../img/3.png">
        <img class="homeimg1" src="../img/4.jpg">
    </div>
</body>

</html>