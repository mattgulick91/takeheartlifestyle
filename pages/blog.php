<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Take Heart Lifestyle</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
  <body class="photography-body">

<!-- Navbar -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarResponsive">
    		<ul class="navbar-nav ml-auto">
    			<li class="nav-item">
    				<a class="nav-link" href="../index.php">Home</a>
    			</li>
    			<li class="nav-item active">
    				<a class="nav-link" href="#">Blog</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="photography.php">Photography</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="shop.php">Shop</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="about.php">About Me</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="contact.php">Contact</a>
    			</li>
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
    			<li class="nav-item">
    				<a class="nav-link" href="../php/logout.php">Logout</a>
    			</li>
				<?php } ?>

    		</ul>
    	</div>
    </nav>

		<!-- New Blog Form -->

		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	    ?>
		<div class="spacing-large">
		</div>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-10 text-center new-blog-form">
					<form enctype="multipart/form-data" class="" action="../php/newBlogPage.php" method="post">
						<input required="required" class="mb-2 blog-title-form text-center" type="text" name="blog-name" placeholder="Enter Blog Title Here">
						<textarea required="required" class="mb-2 blog-title-form text-center" name="blog-desc" rows="8" cols="80" placeholder="Enter Blog Description Here"></textarea><br>
						<p class="blog-title-form">Select Blog Image:</p>
						<input required="required" class="mb-4" type="file" name="blog-img"><br>
						<input class="btn btn-primary btn-blog" type="submit" name="" value="New Blog">
					</form>
				</div>
			</div>
		</div>
	<?php } ?>

    <!-- Blog -->

    <div class="container-fluid blog-container" id="blog">
    	<div class="row justify-content-center">
				<div class="col-sm-12 col-lg-10">
					<div class="container-fluid">
						<div class="row">
							<?php include_once "../php/printBlogCards.php"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- Footer -->

    <footer>
      <div id="contact" class="container-fluid">
        <div class="row justify-content-center">
        	<div class="col-md-5 text-center">
        		<a href="https://www.facebook.com/amber.ayarza" target="_blank"><i class="fab fa-facebook-square"></i></a>
        		<a href="https://pin.it/3etllu7bn6ljt7" target="_blank"><i class="fab fa-pinterest-square"></i></a>
        		<a href="https://www.instagram.com/ambam821/" target="_blank"><i class="fab fa-instagram"></i></a>
        	</div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>
