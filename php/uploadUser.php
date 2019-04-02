<?php
include_once "dbConn.php";

//Add user email to database

$firstName = mysqli_real_escape_string($conn, $_POST['first-name-input']);
$lastName = mysqli_real_escape_string($conn, $_POST['last-name-input']);
$userEmail = mysqli_real_escape_string($conn, $_POST['email-input']);

$sql = "INSERT INTO users (FirstName, LastName, Email) VALUES (?, ?, ?);";

$stmt = mysqli_stmt_init($conn);

//Check if upload was successful
if(!mysqli_stmt_prepare($stmt, $sql)){
  echo "SQL error!";
} else {
  mysqli_stmt_bind_param($stmt, "sss", $firstName, $lastName, $userEmail);
  mysqli_stmt_execute($stmt);
  include_once "mailer.php";
  header("Location: ../pages/success.php");
}

//Clear out POST variables
unset($_POST['first-name-input']);
unset($_POST['last-name-input']);
unset($_POST['email-input']);

 ?>
