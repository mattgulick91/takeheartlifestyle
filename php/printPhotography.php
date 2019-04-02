<?php
include_once "dbConn.php";

//print photos under carousel by iterating through database

$printPhotoSql = "SELECT * FROM photography";

$result = mysqli_query($conn, $printPhotoSql);

$photoInfos = array();
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $photoInfos[] = $row;
  }
}

$slideIndex = 0;

for ($i = count($photoInfos) - 1; $i >= 0; $i--){
  $img = $photoInfos[$i]['fileName'];
  echo '
  <div class="col-6 col-lg-3 image-container">
    <a href="#myCarousel" data-slide-to="'.$slideIndex.'" onclick="topFunction()">
      <img class="photo-image" src="../photos/'.$img.'" alt="">
    </a>
  </div>';
  $slideIndex++;
}

 ?>
