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
			<li class="nav-item">
				<a class="nav-link" href="blog.php">Blog</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#photography">Photography</a>
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

<div class="spacing">
</div>

<!-- Photography Upload Form -->

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 text-center mb-4 mt-4" style="background-color: white;">
			<form enctype="multipart/form-data" action="../php/uploadPhotography.php" method="post">
				Upload Image: <br>
				<input required="required" type="file" name="photo-file">
				<input type="submit" class="btn btn-primary" name="" value="Upload">
			</form>
		</div>
	</div>
</div>
<?php } ?>

<!-- Contact for Rates banner -->

<div class="container-fluid">
	<div class="row">
		<div class="photo-caption col-sm-12 text-center">
			<h1 class="photo-caption-text">Contact for rates and scheduling.</h1>
		</div>
	</div>
</div>

<!-- Photography Carousel -->

<div id="myCarousel" class="carousel slide image-carousel" data-ride="carousel">
  <div id="carousel-inner" class="carousel-inner">
    <?php include_once "../php/printCarousel.php"; ?>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Lower Photos -->

<div class="container-fluid">
	<div class="row">
		<?php include_once "../php/printPhotography.php" ?>
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

<script type="text/javascript">
	var carouselDiv = document.getElementById('carousel-inner');
	carouselDiv.children[0].setAttribute("class", "active carousel-item");

	function topFunction() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="../js/scripts.js"></script>
</body>
</html>
