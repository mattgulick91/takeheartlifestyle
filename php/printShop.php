<?php
include_once "dbConn.php";

//print shop cards to shop page by iterating through database

$printShopSql = "SELECT * FROM products WHERE isVisible=1";

$result = mysqli_query($conn, $printShopSql);

$shopInfos = array();
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $shopInfos[] = $row;
  }
}

for ($i = count($shopInfos) - 1; $i >= 0; $i--){
  $id = $shopInfos[$i]['productId'];
  $title = $shopInfos[$i]['title'];
  $url = $shopInfos[$i]['link'];
  $img = $shopInfos[$i]['image'];
  $desc = $shopInfos[$i]['description'];
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
      <div class="card text-center">
        <a target="_blank" href="'.$url.'">
          <div class="card-img-top" style="background-image: url(../shopImages/'.$img.'); background-size: cover; height: 15em; background-position: 50% 50%;"></div>
          <div class="card-body text-center">
            <h5 class="card-title text-center">'.$title.'</h5>
            <hr class="card-hr">
            <p class="card-text">'.$desc.'</p>
            <hr class="card-hr">
          </div>
        </a>
        <form onsubmit="deleteSub()" class="mb-4" action="../php/deleteShopItem.php" method="post">
          <input type="hidden" name="product-id" value="'.$id.'">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>';
  } else {
    echo '
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
      <div class="card text-center">
        <a target="_blank" href="'.$url.'">
          <div class="card-img-top" style="background-image: url(../shopImages/'.$img.'); background-size: cover; height: 15em; background-position: 50% 50%;"></div>
          <div class="card-body text-center">
            <h5 class="card-title text-center">'.$title.'</h5>
            <hr class="card-hr">
            <p class="card-text">'.$desc.'</p>
            <hr class="card-hr">
          </div>
        </a>
      </div>
    </div>';
  };
}


 ?>
