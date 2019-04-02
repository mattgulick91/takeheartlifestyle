<?php
include_once 'dbConn.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//Send a thank you email when someone subscribes to page

$emailSql = "SELECT * FROM email WHERE emailId = hidden";

$emailResult = mysqli_query($conn, $emailSql);

$emailInfos = mysqli_fetch_assoc($emailResult);

$emailUsername = $emailInfos['email'];
$emailPassword = $emailInfos['password'];

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tsl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = $emailUsername;
$mail->Password = $emailPassword;
$mail->SetFrom(//hidden);
$mail->Subject = "Hey Friend!!";
$mail->Body = "Welcome!!!
<br><br>
Thank you SO much for subscribing to Take Heart Lifestyle!
<br>
I’m happy for you to be part of our village!!
<br>
This is your golden ticket to stay current and be the first to get exclusive offers/discounts!
<br><br>
Please reach out anytime!!";

$mail->AddAddress($_POST['email-input']);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Email sent!";
}


?>
