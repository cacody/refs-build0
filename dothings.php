<?php

foreach ($_POST as $var=>$val) $$var = $val;

echo $_POST['first_name'];
echo '<br>';
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
echo $firstname . " " .$lastname;
echo '<br>';
$myPath getcwd().'/pdfs/';
echo '<hr><br>';
//phpinfo();


require_once "classes/tcpdf/tcpdf.php";
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Export HTML table data using TCPDF");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->addPage();
$content = '';
$content .= "<h3 align=\"center\">$firstname $lastname</h3>";
$pdffilepath = $myPath;
$pdffilename = 'RECORD_'.date('YmdHis').'.pdf';
$obj_pdf->writeHTML($content);
$obj_pdf->Output("$pdffilepath.$pdffilename", 'F');

echo $pdffilepath.$pdffilename;

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