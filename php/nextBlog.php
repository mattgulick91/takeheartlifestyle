<?php
include_once "dbConn.php";

//Find next highest blog id and redirect to that page

$currentId = $_POST['blog-id'];
$nextSql = "SELECT url FROM blogs WHERE blogId = (SELECT Min(blogId) FROM blogs WHERE blogId > $currentId)";

$nextResult = $conn->query($nextSql);

$nextUrl = mysqli_fetch_assoc($nextResult);

if(!$nextUrl['url']){
  echo "Redirect unsuccessful.";
} else {
  header("Location: ../pages/blogs/".$nextUrl['url']."");
}

 ?>
