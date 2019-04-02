<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Take Heart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pages/blog.php">Blog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pages/photography.php">Photography</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pages/shop.php">Shop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pages/about.php">About Me</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pages/contact.php">Contact</a>
			</li>
			<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
			<li class="nav-item">
				<a class="nav-link" href="php/logout.php">Logout</a>
			</li>
		<?php } ?>
		</ul>
	</div>
</nav>

<!-- Landing -->

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-10 caption">
				<h1 class="text-center">TAKE HEART</h1>
				<h3 class="hero-caption text-center">a blog for the woman next door</h3>
		</div>
	</div>
</div>

<!-- Redirection Cards -->

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="mb-4 col-sm-10 col-lg-4 col-xl-3">
			<div class="card">
				<a href="pages/blog.php">
					<div style="background-image: url('website_images/blog_card_crop2.jpeg'); background-size: cover; height: 20em; background-position: 50% 30%;">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title text-center">Blog</h5>
						<hr class="card-hr">
						<p class="card-text">Grab some coffee, get cozy and follow along as I share all things life + style.  Hope you enjoy!<br> Xx</p>
						<hr class="card-hr">
					</div>
				</a>
			</div>
		</div>
		<div class="mb-4 col-sm-10 col-lg-4 col-xl-3">
			<div class="card">
				<a href="pages/photography.php">
					<div style="background-image: url('website_images/photography-card-image.JPG'); background-size: cover; height: 20em; background-position: 60% 65%;">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title text-center">Photography</h5>
						<hr class="card-hr">
						<p class="card-text">Specializing in lifestyle, boutique fashion, small business and blogger photography. Contact for rates and scheduling.</p>
						<hr class="card-hr">
					</div>
				</a>
			</div>
		</div>
		<div class="col-sm-10 col-lg-4 col-xl-3">
			<div class="card">
				<a href="pages/shop.php">
					<div style="background-image: url('website_images/shop-card-image.JPG'); background-size: cover; height: 20em; background-position: 50% 50%;">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title text-center">Shop</h5>
						<hr class="card-hr">
						<p class="card-text">Let's go shopping! Take a look at a few of my favorite things and enjoy personalized discount codes with some of my favorite businesses!</p>
						<hr class="card-hr">
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- CTA -->

<div class="container cta-container" id="cta">
	<div class="row justify-content-center">
		<div class="col-10 col-md-8 col-lg-6 col-xl-4 cta-body">
			<h1 class="cta-header text-center">Hey Beautiful!</h1>
			<p class="cta-text text-center">Let's stay connected...</p>
			<form action="php/uploadUser.php" method="post" class="form-inline justify-content-center">
				<label class="sr-only" for="inlineFormInputName2">Name</label>
				<input type="text" required="required" class="form-control mb-2 mr-sm-2 col-10" id="FirstNameInput" name="first-name-input" placeholder="First Name">
				<input type="text" required="required" class="form-control mb-2 mr-sm-2 col-10" id="LastNameInput" name="last-name-input" placeholder="Last Name">
				<input type="text" required="required" class="form-control mb-2 mr-sm-2 col-10" id="EmailInput" name="email-input" placeholder="Email Address">
				<input type="submit" class="btn btn-primary col-4" value="Join"><br>
			</form>
		</div>
	</form>
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

<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>
