<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

foreach ($_POST as $var=>$val) $$var = $val;

echo $_POST['first_name'];
echo '<br>';
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
echo $firstname . " " .$lastname;
echo '<br>';
$pdffilepath = $_SERVER['DOCUMENT_ROOT'] . "/pdfs" . "/";
echo $pdffilepath;
echo '<hr><br>';
echo $_SERVER['DOCUMENT_ROOT'];
echo '<br>';
//phpinfo();

$myfile = fopen($firstname."/newfile.txt", "W") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

$pdffilename = $firstname . '-' . $lastname.'.pdf';

require_once "classes/tcpdf/tcpdf.php";
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->addPage();
$content = '';
$content .= "<p>$firstname $lastname</p>";
$obj_pdf->writeHTML($content);
$obj_pdf->Output($pdffilepath.$pdffilename, 'F');

require 'classes/PHPMailer_5.2.1/class.phpmailer.php';
$mail = new PHPMailer;
$mail->setFrom('barleyandhops@beerworld.com', "$firstname");
$mail->addAddress('cacody@umich.edu', 'My Friend');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}





//OMFS_DE.obvyimbylm2hpewu@u.box.com

?>