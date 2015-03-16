<?php
$dbhost = 'localhost';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$db = 'derby';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	foreach ($_POST as $key => $value)
 echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	
?>