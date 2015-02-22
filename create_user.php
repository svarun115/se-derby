<?php
echo "CREATING USER ";

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';

$email = 'abc@example.com';		//CHANGE TO POST METHOD ACCEPT
$password = 'welcome';			//CHANGE TO POST METHOD ACCEPT
$member_id = '123';					//AUTO GENERATE by MySQL

$hash = password_hash("$password", PASSWORD_DEFAULT);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
echo "<br>Connection successful";

$sql="INSERT into auth values('$member_id','$email','$hash')";
$result=mysqli_query($conn,$sql);
echo "<br>user created";
