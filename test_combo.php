<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>test_combo</title>
	
</head>
<body id="test_combo">
	
	<form action="dothings.php" method="post" accept-charset="utf-8">
		
		<label for="first_name"></label><input type="text" name="first_name" value="" id="first_name">
		<label for="last_name"></label><input type="text" name="last_name" value="" id="last_name">

		<p><input type="submit" value="Submit"></p>
	</form>
	<hr>
	<?php echo $_SERVER['DOCUMENT_ROOT'];?>
	
</body>

</html>