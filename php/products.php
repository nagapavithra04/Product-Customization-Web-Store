
<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ?>
    <?php 
    $cid= $_GET['id'] ?? "";
    if(empty($cid)){
        throw new ErrorException("Error: This page requires a category ID.");
    }
    $category_qry = $conn->query("SELECT * FROM `category_list` where `id` = '{$cid}'");
    if($category_qry->num_rows > 0){
        $data = $category_qry->fetch_assoc();

    }else{
        throw new ErrorException("Error: This page requires a category ID.");
    }
    
    ?>

<head>
    <title>BLUELIGHT</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/categories.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/tshirt.css">
    <link rel="stylesheet" href="../css/cart.css">

       
        <script src="../js/fabric.min.js"></script>
        <script src="../js/colors.js"></script>
        <script src="../js/header.js"></script>
        <script src="../js/download.js"></script>
        <script src="../js/qty.js"></script>   
        <script src="../js/scripts.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    

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
    <section class="page-section" id="menu" style="position: absolute; z-index: 5;">
        <div class="row mx-0">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="menu-field" class="card-deck px-2 py-3 justify-content-center">
                        <?php 
                            include 'admin/db_connect.php';
                            $limit = 10;
                            $page = (isset($_GET['_page']) && $_GET['_page'] > 0) ? $_GET['_page'] - 1 : 0 ;
                            $offset = $page > 0 ? $page * $limit : 0;
                            $all_menu =$conn->query("SELECT id FROM  product_list")->num_rows;
                            $page_btn_count = ceil($all_menu / $limit);
                            $qry = $conn->query("SELECT * FROM  product_list where `category_id` = '{$cid}' order by `name` asc Limit $limit OFFSET $offset ");
                            while($row = $qry->fetch_assoc()):
                            ?>
                            <div class="col-lg-3 mb-3">
                            <div class="card menu-item  rounded-0">
                                <div class="position-relative overflow-hidden" id="item-img-holder">
                                    <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body rounded-0">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <p class="card-text truncate"><?php echo $row['description'] ?></p>
                                <div class="text-center">
                                    <button ><a href="product-view-<?php echo $row['category_id'] ?>.php?id=<?php echo $row['id'] ?>"><i class="fa fa-eye"></i> View</a></button>
                                </div>
                                </div>
                                
                            </div>
                            </div>
                            <?php endwhile; ?>
                </div>
            </div>
        </div>
     </section>
    </script>
</body>

</html>