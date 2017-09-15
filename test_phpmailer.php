


<?php
require './classes/PHPMailer_5.2.1/class.phpmailer.php';
$mail = new PHPMailer;
$mail->setFrom('barleyandhops@beerworld.com', 'Greg');
$mail->addAddress('cacody@umich.edu', 'My Friend');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}