<?php

//Set isVisible to zero to hide product card

include_once "dbConn.php";

$deleteShopSql = 'UPDATE products SET isVisible=0 WHERE productId='.$_POST['product-id'].'';

mysqli_query($conn, $deleteShopSql);

header("Location: ../pages/shop.php");
 ?>
