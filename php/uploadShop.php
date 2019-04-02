<?php
include_once "dbConn.php";

//Upload image to shopImages and add info to database

$shopImage = $_FILES["shop-image-file"]["name"];
$shopTitle = $_POST['shop-title'];
$shopDesc = $_POST['shop-desc'];
$shopLink = $_POST['shop-link'];
$shopSql = "INSERT INTO products (image, title, description, link) VALUES ('$shopImage', '$shopTitle', '$shopDesc', '$shopLink')";

//Check if SQL query was successful
if($conn->query($shopSql) === TRUE) {
  echo "Product uploaded successfully!";
} else {
  echo "Error: " . $shopSql . "<br>" . $conn->error;
}

$conn->close();

$target_dir = "../shopImages/";
$target_file = $target_dir . basename($_FILES["shop-image-file"]["name"]);
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
    if (move_uploaded_file($_FILES["shop-image-file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["shop-image-file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header('Location: ../pages/shop.php');

?>
