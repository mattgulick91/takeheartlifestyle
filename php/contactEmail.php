<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

 	$mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tsl';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->Username = //email hidden;
  $mail->Password = //password hidden;
  $mail->SetFrom($_POST['contact-email']);
  $mail->Subject = $_POST['contact-subject'];
  $mail->Body = $_POST['contact-body'];
  $mail->AddAddress(//emailhidden);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo '<script type="text/javascript">
        alert("Sent successfully!");
      </script>';
   }


header("Location: ../index.php");

?>
