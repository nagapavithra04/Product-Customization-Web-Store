
<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
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
    <?php
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
                                    <button class="btn btn-sm btn-outline-dark view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                    
                                </div>
                                </div>
                                
                            </div>
                            </div>
                            <?php endwhile; ?>
                </div>
            </div>
        </div>
     </section>
</body>

</html>