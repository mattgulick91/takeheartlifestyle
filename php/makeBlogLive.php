<?php
include_once "dbConn.php";

//Set isVisible to 1 to print card when iterating through array.

$blogUrl = $_POST['blog-url'];

if($blogUrl !== 'title'){
  $liveSql = "UPDATE blogs SET isVisible = 1 WHERE title = $blogUrl";
}

if(!$conn->query($liveSql) === TRUE){
  echo "Query failed.";
} else {
  echo "Query successful.";
}

header('Location: ../pages/blog.php');

 ?>
