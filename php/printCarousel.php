<?php
include_once "dbConn.php";

//add photos to photography carousel by iterating through database

$printCarSql = "SELECT * FROM photography";

$result = mysqli_query($conn, $printCarSql);

$carInfos = array();
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $carInfos[] = $row;
  }
}

for ($i = count($carInfos) - 1; $i >= 0; $i--){
  $img = $carInfos[$i]['fileName'];
  echo '
  <div class="carousel-item">
    <img class="d-block carousel-image" src="../photos/'.$img.'">
  </div>';
}


 ?>
