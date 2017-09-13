<?php 

function fetch_data() 
{
	$servername	= 'webapps4-db.miserver.it.umich.edu';
	$database	= 'dlsworklist';
	$username	= 'dlsworklist';
	$password	= 'BigLeapFargo19@$';

	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$output = '';
	$query = "SELECT * FROM People";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))
        { 
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["firstname"].'</td>
				<td>'.$row["lastname"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["reg_date"].'</td>
			</tr>
		';
 	}
	return $output;
}

if(isset($_POST["create_pdf"]))
{
	require_once "./classes/tcpdf/tcpdf.php";
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
	
	$content .= '
		<h3 align="center">Export HTML Table data to PDF</h3>
		<table border="1" cellspacing="0" cellpadding="5">
		    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">First Name</th>
                        <th width="20%">Last Name</th>
                        <th width="25%">Email</th>
                        <th width="30%"> Reg Date</th>
                    </tr>
	';

	$content .= fetch_data();

	$content .= '</table>';

	$obj_pdf->writeHTML($content);
	$obj_pdf->Output("sample.pdf", "I");

}



?>

<!DOCTYPE html>
<html>
  <head>
    <title>
       Simple PDF Creator
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  </head>
  <body>
    <br /><br />
    <div class="container" style="width:700px">
	<h3 align="center">Export HTML table data to PDF</h3>
        <br />
        <div class="table-responsive">
		<table class="table table-bordered">
		    <tr>
			<td width="5%">ID</td>
			<td width="20%">First Name</td>
			<td width="20%">Last Name</td>
			<td width="25%">Email</td>
			<td width="30%"> Reg Date</td>
		    </tr>
		    <?php echo fetch_data(); ?> 
		</table>
		<form method="post">
			<input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
		</form> 
	</div>
    </div>

<?php //echo phpinfo(); ?>
  </body>
</html>
