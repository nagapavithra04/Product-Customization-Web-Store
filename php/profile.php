<html>
<head>
    <title>BLUELIGHT</title>
    <?php
    session_start();
    include('header.php');
    include ('admin/db_connect.php');
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
    <div id="profile">
    <div class="container2">
        <div class="card">
            <div class="card-body">
                <form method="post" action="admin/ajax.php?action=logout2" id="checkout-frm" style="font-size: large;font-weight: bold;  font-family: 'Times New Roman', Times, serif;">
                    <h1 style="text-align:center;margin-top: 30px;">WELCOME TO BLUELIGHT</h1><br>
                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="name" required="" class="form-control" value="<?php echo $_SESSION['login_username'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_useremail'] ?>" readonly>
                    </div>  
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_userphoneno'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control" readonly><?php echo $_SESSION['login_useraddress'] ?></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-block btn-outline-dark" >LOGOUT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div> 
</body>

</html>