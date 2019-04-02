<?php
include_once "dbConn.php";

//Upload image to photography folder and add info to database

$photoFile = $_FILES["photo-file"]["name"];
$photoSql = "INSERT INTO photography (fileName) VALUES ('$photoFile')";

//Check if photo was uploaded successfully
if($conn->query($photoSql) === TRUE) {
  echo "Photo uploaded successfully!";
} else {
  echo "Error: " . $photoSql . "<br>" . $conn->error;
}

$conn->close();

$target_dir = "../photos/";
$target_file = $target_dir . basename($_FILES["photo-file"]["name"]);
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
    if (move_uploaded_file($_FILES["photo-file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo-file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header('Location: ../pages/photography.php');

?>
