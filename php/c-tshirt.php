<?php ob_start(); ?>
<?php 
  session_start();
  include ('header.php');
  include ('admin/db_connect.php');
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
    <div class="container" style="width: 1000px;height: 700px;margin-top: 30px;margin-left: 270px;">
            <div class="image" style="font-size: 25px;font-weight: bolder;padding-bottom: 30px;">
                UPLOAD YOUR CUSTOM IMAGE HERE<br><br>
                <form  id="manage-img" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="" class="control-label">Image</label>
                  <input type="file" class="form-control" name="image" onchange="displayImg(this,$(this))" required/>
                  <img src="<?php echo isset($img_path) ? 'assets/img/'.$cover_img :'' ?>" alt="" id="cimg" style="margin-top: 30px;margin-left: -50px;">
                  <div class="form-group">
								    <label class="control-label">Category </label>
								    <select style="font-size: 25px" name="custom_category_id" id="" class="custom-select browser-default" required>
                                      <option value="">List of Categories</option>
                                      <?php
									  $cat = $conn->query("SELECT * FROM custom_built order by name asc ");
									  while($row=$cat->fetch_assoc()):
									  ?>
									  <option value="<?php echo $row['id'] ?>" style="font-size: 25px;"><?php echo $row['name'] ?></option>
									  <?php endwhile; ?>
								    </select>
								
						      </div>
                  </div>
                 <button class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="save_btn" id="save-button" style="height:30px;font-size: 15px;background-color:green;">Save and Continue</button>
</form>
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
  </script>
<?php
  
if (isset($_POST['save_btn'])) {
    // Open a connection to the Bluelight database using mysqli
    $conn = new mysqli('localhost','root','','bluelight');

    // Check for errors in connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_SESSION['login_userid'])) {
      $user_id = $_SESSION['login_userid'];
  } else {
      $user_id = null;
  }
    $custom_category_id = $_POST['custom_category_id'];
    // Get the name and temporary path of the uploaded image file
    $image_name = $_FILES['image']['name'];
    $tmp_image_path = $_FILES['image']['tmp_name'];

    // Define the upload directory and the new path of the image file
    $upload_dir = "assets/img/";
    $new_image_path = $upload_dir . $image_name;
    
    // Move the uploaded image file to the new path
    move_uploaded_file($tmp_image_path, $new_image_path);

    // Prepare the SQL statement to insert the image path into the custom_image table
    $stmt = $conn->prepare("INSERT INTO custom_image (img_path, user_id,custom_product_id,status) VALUES (?, '$user_id','$custom_category_id',0)");
    $stmt->bind_param("s", $new_image_path);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
  
    $image_id = $conn->insert_id;
    
    // Build the URL for the next page using the ID and custom_category_id as query parameters
    $next_page_url = "custom_view_$custom_category_id.php?id=$image_id&cat_id=$_POST[custom_category_id]";
    
    // Redirect to the next page
    header("Location: $next_page_url");

    exit();
    $conn->close();
}
?>
</body>

</html>