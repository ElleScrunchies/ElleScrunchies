<?php
  require '../plugins/PHPMailer/src/Exception.php';
  require '../plugins/PHPMailer/src/PHPMailer.php';
  require '../plugins/PHPMailer/src/SMTP.php';
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ellescrunchies03@gmail.com';

  $mail = new PHPMailer(true);
    
  $mail->isSMTP();                                   
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;                          
  $mail->Username = "ichibanyan@gmail.com";                 
  $mail->Password = "cfzihphdcnedidyq"; //"salungaadriannemark09102727159";
  $mail->SMTPSecure = "ssl";                           
  $mail->Port = 465;                                   
  $mail->From = "ichibanyan@gmail.com";
  $mail->isHTML(true);
  $mail->FromName = $_POST['name'];
  $mail->Subject = $_POST['subject'];
  $mail->Body = 'Email From: '.$_POST['email'].':<br/> '.$_POST['message'];
  $mail->AltBody = strip_tags($_POST['message']);
  $mail->AddAddress($receiving_email_address);

  try {
      $mail->send();
      echo 'OK';
      exit();
  } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
?>
