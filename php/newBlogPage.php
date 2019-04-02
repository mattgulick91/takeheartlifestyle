<?php
include_once "dbConn.php";

// Create a new html page and upload into blog database

$trimBlogName = preg_replace('/\s+/', '', $_POST['blog-name']);
$blogName = $_POST['blog-name'];
$blogDesc = $_POST['blog-desc'];
$blogImg = basename($_FILES["blog-img"]["name"]);
$blogSql = "INSERT INTO blogs (title, url, blogDescription, imageUrl) VALUES ('$blogName', '$trimBlogName.php', '$blogDesc', '$blogImg')";


// Run SQL query
if($conn->query($blogSql) === TRUE) {
  echo "New blog created successfully!";
} else {
  echo "Error: " . $blogSql . "<br>" . $conn->error;
}

$blogIdSql = "SELECT blogId FROM blogs WHERE title = $blogName";

$blogId = $conn->query($blogIdSql);

$finalId = mysqli_fetch_assoc($blogId);

$conn->close();


//Upload image
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["blog-img"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["blog-img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["blog-img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


//Create new blog page
$fp = fopen("../pages/blogs/" . $trimBlogName . ".php", "w");

if (!$fp){
  echo "File write failed.";
} else {
fwrite($fp, '
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Take Heart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/styles.css">
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
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
    				<a class="nav-link" href="../../index.php">Home</a>
    			</li>
    			<li class="nav-item active">
    				<a class="nav-link" href="../blog.php">Blog</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="../photography.php">Photography</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="../shop.php">Shop</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="../about.php">About Me</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="../contact.php">Contact</a>
    			</li>
          <?php if (isset($_SESSION[\'loggedin\']) && $_SESSION[\'loggedin\'] == true) { ?>
    			<li class="nav-item">
    				<a class="nav-link" href="../php/logout.php">Logout</a>
    			</li>
				<?php } ?>
    		</ul>
    	</div>
    </nav>

    <div class="spacing-large">
    </div>

    <!-- Blog -->

    <div class="container blog-container" id="blog">
    	<div class="row justify-content-center">
    		<div class="blog-body col-sm-10 col-md-10 col-lg-10 text-center">
    			<h1 class="blog-header text-center">'.$blogName.'</h1>
    			<hr class="blog-ruler col-10 offset-1">

          <?php if (isset($_SESSION[\'loggedin\']) && $_SESSION[\'loggedin\'] == true) { ?>
					<h3 style="color: red;">!!! PASTE WITH CTRL + SHIFT + V !!!</h3>
					<h3 style="color: red;">!!! MAKE SURE TO NOT END WITH ENTER BUTTON !!!</h3>
					<form action="../../php/openBlogAndWrite.php" method="post">
						<!-- This is where you\'ll need to enter $blogName -->
						<input type="hidden" name="current-blog" value="'.$trimBlogName.'">
						<textarea style="max-width: 100%;" name="editor1"></textarea>
						<script>
							CKEDITOR.replace( \'editor1\' );
						</script><br>
						<input class="btn btn-primary mb-4" type="submit" name="" value="Submit"><br>
					</form>
					<form enctype="multipart/form-data" class="" action="../../php/uploadImage.php" method="post">
            <input type="hidden" name="current-blog-image" value="'.$trimBlogName.'">
            <input class="mb-2" type="file" id="image-file" name="imageFile" accept=".jpg,.png,.gif"><br>
						<input class="btn btn-primary mb-4" type="submit" value="Upload Image">
					</form>
          <?php } ?>
					<div id="blog-content">

					</div>
					<form style="display: inline;" class="" action="../../php/previousBlog.php" method="post">
						<input type="hidden" name="blog-id" value="'.$finalId['blogId'].'">
						<input class="btn btn-light mb-4" type="submit" name="button" value="Previous Post">
					</form>
					<form style="display: inline;" class="" action="../../php/nextBlog.php" method="post">
						<input type="hidden" name="blog-id" value="'.$finalId['blogId'].'">
						<input class="btn btn-light mb-4" type="submit" name="button" value="Next Post">
					</form>
    		</div>
    	</div>
    </div>

    <?php if (isset($_SESSION[\'loggedin\']) && $_SESSION[\'loggedin\'] == true) { ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 text-center">
					<form class="" action="../../php/makeBlogLive.php" method="post">
						<input type="hidden" name="blog-url" value="'.$trimBlogName.'">
						<input class="btn btn-danger mt-4" type="submit" name="" value="Make Blog Live">
					</form>
				</div>
			</div>
		</div>
    <?php } ?>

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
    <script src="../../js/scripts.js"></script>
  </body>
</html>
');
header('Location: ../pages/blogs/' . $trimBlogName . '.php');
}


 ?>
