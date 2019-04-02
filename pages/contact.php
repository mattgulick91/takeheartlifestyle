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
<body>

<!-- Navigation -->

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
			<li class="nav-item">
				<a class="nav-link" href="photography.php">Photography</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="shop.php">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="about.php">About Me</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#">Contact</a>
			</li>
			<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
			<li class="nav-item">
				<a class="nav-link" href="../php/logout.php">Logout</a>
			</li>
		<?php } ?>
		</ul>
	</div>
</nav>

<!-- Question Form -->

<div class="container-fluid cta-container" id="cta">
	<div class="row justify-content-center">
		<div class="col-10 col-md-8 col-lg-6 col-xl-4 cta-body">
			<h1 class="text-center">Questions/Inquiries</h1>
			<p class="cta-text text-center">Email Me!</p>
			<form class="text-center" method="post" action="../php/contactEmail.php">
				<input required="required" type="text" name="contact-email" class="mb-2 text-center" placeholder="Email Address"><br>
				<input required="required" type="text" name="contact-subject" class="mb-2 text-center" placeholder="Subject">
				<textarea required="required" class="text-center mb-2 contact-body" name="contact-body" rows="8" cols="60" placeholder="What can we help you with?"></textarea><br>
				<input type="submit" class="btn btn-primary" value="Send">
			</form>
		</div>
	</div>
</div>

<div class="spacing-bottom">
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

<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>
</body>
</html>
