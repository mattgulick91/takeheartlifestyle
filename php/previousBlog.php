<?php
include_once "dbConn.php";

//Find next lowest id in database and redirect to that page

$currentId = $_POST['blog-id'];
$prevSql = "SELECT url FROM blogs WHERE blogId = (SELECT Max(blogId) FROM blogs WHERE blogId < $currentId)";

$prevResult = $conn->query($prevSql);

$prevUrl = mysqli_fetch_assoc($prevResult);

if(!$prevUrl['url']){
  echo "Redirect unsuccessful.";
} else {
  header("Location: ../pages/blogs/".$prevUrl['url']."");
}

 ?>
