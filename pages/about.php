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
			<li class="nav-item active">
				<a class="nav-link" href="#">About Me</a>
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

<!-- About -->

<div class="container-fluid">
  <div class="row">
    <div class="about-pic-container col-12">
      <h1 class="about-title text-center">About Take Heart</h1>
    </div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
    <div class="about-caption col-12">
      <h1 class="about-caption-text text-center">"A place to feel encouraged..."</h1>
    </div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="about-body col-12">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-sm-10 col-md-8 col-lg-4">
						<img class="about-small-image text-center" src="../photos/../website_images/about-me-2.JPG" alt="">
					</div>
					<div class="col-12">
						<p class="about-text text-center"><br>Welcome!  I’m so glad you’re here.<br><br> My name is Amber and I am mom to 3 boys and wife to my forever crush.  I’m a Texas girl who loves Jesus, family, friends and cheese-fries! (Don’t forget the bacon & jalapeños) We are a blended family and I’m happiest when all 5 of us are under one roof!  My background for the last 9 years has been in insurance sprinkled with marketing, networking, and photography.  I have a passion for design, style, and sharing.  I’m not a “writer” in the traditional, scholarly sense..... but when I write, I want people to feel like I’m talking to my best friend. <br><br>Hey girl, I’m talking to YOU!<br><br>



I created Take Heart Lifestyle as a landing place to cultivate relationships with other women and build a sense of community.  After we welcomed our rainbow baby in October 2018, I was blessed with the opportunity to be home full time and quickly realized I needed a creative outlet.   I wanted something for me. I wanted a place for others to feel encouraged. Take Heart Lifestyle is a platform to be able to share all things motherhood, marriage, faith, fashion and everything in between.  My goal is to reach other women and say hey sister, we are in this together..... let’s be a village!<br><br>



The name Take Heart comes from one of my favorite bible verses John 16:33<br><br>


"I have told you these things, so that in me you may have peace. In this world you will have trouble. But take heart! I have overcome the world."
						</p>
					</div>
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

<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>
</body>
</html>
