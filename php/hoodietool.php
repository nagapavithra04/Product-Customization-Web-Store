<html>
<head>
    <title>BLUELIGHT</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/categories.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/tshirt.css">
    <link rel="stylesheet" href="../css/cart.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
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
    <div id="custom-tshirt" class="container">
        <div class="image_container">
            <h1 class="name">CUSTOMIZED HOODIE</h1>
            <div id="tshirt-div">
                <div id="tshirt">
                    <img  src="../img/m5.png" width="400px" height="400px">
                    <div id="drawingArea" class="drawing-area">
                        <div class="canvas-container">
                            <canvas id="tshirt-canvas" width="200" height="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="customs">
            <div class="colors">
                COLORS
                <ul id="data-color">
                    <li data-color="#000000" style="background-color:#000000 ;"></li>
                    <li data-color="#FFFFFF" style="background-color:#FFFFFF ;"></li>
                    <li data-color="#F44336" style="background-color:#F44336 ;"></li>
                    <li data-color="#E91E63" style="background-color:#E91E63 ;"></li>
                    <li data-color="#9C27B0" style="background-color:#9C27B0 ;"></li>
                    <li data-color="#673AB7" style="background-color:#673AB7 ;"></li>
                    <li data-color="#3F51B5" style="background-color:#3F51B5 ;"></li>
                    <li data-color="#100c3a" style="background-color:#100c3a ;"></li>
                    <li data-color="#03A9F4" style="background-color:#03A9F4 ;"></li>
                    <li data-color="#009688" style="background-color:#009688 ;"></li><br>
                    <li data-color="#4CAF50" style="background-color:#4CAF50 ;"></li>
                    <li data-color="#8BC34A" style="background-color:#8BC34A ;"></li>
                    <li data-color="#CDDC39" style="background-color:#CDDC39 ;"></li>
                    <li data-color="#FFEB3B" style="background-color:#FFEB3B ;"></li>
                    <li data-color="#FFC107" style="background-color:#FFC107 ;"></li>
                    <li data-color="#FF5722" style="background-color:#FF5722 ;"></li>
                    <li data-color="#FF9800" style="background-color:#FF9800 ;"></li>
                    <li data-color="#795548" style="background-color:#795548 ;"></li>
                    <li data-color="#9E9E9E" style="background-color:#9E9E9E ;"></li>
                    <li data-color="#607D8B" style="background-color:#607D8B ;"></li>
                    <!-- <li data-color="#795548" style="background-color:#795548 ;"></li> -->

                </ul>
            </div>
            <label for="tshirt-design">Hoodie Design:</label>
            <select id="tshirt-design">
                <option value="">Select one of our designs ...</option>
                <option value="../img/t.png">Batman</option>
                <option value="../img/bluelight.png">bluelight</option>
            </select>
            <br><br>
            <label for="tshirt-custompicture">Upload your own design:</label>
            <input type="file" id="tshirt-custompicture" />
            <br>
            <p>To remove a loaded picture on the T-Shirt select it and press the <kbd>DEL</kbd> key.</p>
            <br>
            <button id="dwld" class="btn">DOWNLOAD</button>
        </div>
    </div>
    <script src="../js/fabric.min.js"></script>
    <script src="../js/colors.js"></script>
    <script src="../js/download.js"></script>
    <script src="../js/qty.js"></script> 
</body>

</html>