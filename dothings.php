<?php

foreach ($_POST as $var=>$val) $$var = $val;

echo $_POST['first_name'];

?>