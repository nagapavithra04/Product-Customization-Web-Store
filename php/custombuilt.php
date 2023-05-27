<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>
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
    <div id="category" class="category" style="position: absolute; z-index: 5;display: flex;">
    <div>
    <?php 
                        $categories = $conn->query("SELECT * FROM `custom_built` order by `id` asc");
                        if($categories->num_rows > 0):
                        ?>
                          <div id="category-menu" class="" style="margin-top: -20px;margin-left: -80px;">   
                              <?php 
                                while($row = $categories->fetch_assoc()):
                              ?>
                                <a href="tool_<?php echo $row['id'];?>.php"><img src="assets/img/<?php echo $row['img_path'] ?>"  alt="..." width=250px height=250px style="margin-top: 50px;margin-left: 110px"></a>
                              <?php endwhile; ?>
                          </div>
                        <?php endif; ?>
                       
    </div>  
</body>

</html>