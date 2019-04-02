
<?php
session_start();
include_once "php/dbConn.php";

//Have user input login information and check if it matches the database info

$username = "SELECT username FROM login WHERE loginId = 1";
$password = "SELECT password FROM login WHERE loginId = 1";

$unresult = mysqli_query($conn, $username);
$pwdresult = mysqli_query($conn, $password);

$unm = mysqli_fetch_assoc($unresult);
$pwd = mysqli_fetch_assoc($pwdresult);

//If login succesful, redirect to homepage
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  header("Location: index.php");
}

//Check if username and password match database info
if (isset($_POST['username']) && isset($_POST['password'])) {
  if ($_POST['username'] == $unm['username'] && $_POST['password'] == $pwd['password']){
    $_SESSION['loggedin'] = true;
    header("Location: index.php");
  }
}
?>

<html>
  <body>
    <form method="post" action="login.php">
      Username:<br>  <input type="text" name="username"><br>
      Password:<br> <input type="password" name="password"><br>
      <input type="submit" value="Login">
    </form>
  </body>
</html>
