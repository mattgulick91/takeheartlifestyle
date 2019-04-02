<?php
include_once "dbConn.php";

//Print blog cards to blog page if isVisible is true

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $printBlogsSql = "SELECT * FROM blogs";
} else {
  $printBlogsSql = "SELECT * FROM blogs WHERE isVisible = TRUE";
}

$result = mysqli_query($conn, $printBlogsSql);

$blogInfos = array();
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $blogInfos[] = $row;
  }
}

for ($i = count($blogInfos) - 1; $i >= 0; $i--){
  $id = $blogInfos[$i]['blogId'];
  $title = $blogInfos[$i]['title'];
  $url = $blogInfos[$i]['url'];
  $img = $blogInfos[$i]['imageUrl'];
  $desc = $blogInfos[$i]['blogDescription'];
  echo '
		<div class="col-sm-12 col-md-6 col-xl-4 mb-4">
      <div class="card">
  			<a href="blogs/'.$url.'">
          <div style="background-image: url(../images/'.$img.'); background-size: cover; height: 20em; background-position: 50% 50%;">
          </div>
          <div class="card-body text-center">
  			    <h5 class="card-title text-center">'.$title.'</h5>
  					<hr class="card-hr">
  					<p class="card-text">'.$desc.'</p>
  					<hr class="card-hr">
  			  </div>
  			</a>
      </div>
		</div>';
}


 ?>
