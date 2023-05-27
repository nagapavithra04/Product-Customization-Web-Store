<style>
.bg-dark-custom {
    background-color: #222222!important;
}

.navbar-dark-custom .navbar-nav .nav-link {
    color: #fff;
}

.navbar-dark-custom .navbar-nav .nav-link:hover {
    color: #ffc107;
}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark-custom' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-table"></i></span> Orders</a>
				<a href="index.php?page=menu" class="nav-item nav-menu"><span class='icon-field'><i class="fas fa-shopping-bag"></i></span> Products</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Category List</a>
				<a href="index.php?page=customs" class="nav-item nav-customs"><span class='icon-field'><i class="fa fa-list"></i></span> Custom_Category List</a>
				<a href="index.php?page=custom_products" class="nav-item nav-custom_products"><span class='icon-field'><i class="fas fa-shopping-bag"></i></span> Custom_Products</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>