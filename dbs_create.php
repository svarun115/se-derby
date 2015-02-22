<?php
echo "WELCOME TO DERBY MANAGEMENT TOOL ";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';
$db1 = 'derby';
$db2 = 'club';
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
echo "<br>Connection successful";

//This is a comment

	$sql = "create database if not exists $db1" ; 
	mysqli_query($conn,$sql);
	$sql = "create database if not exists $db2" ; 
	mysqli_query($conn,$sql);
	echo "<br>Created $db1 and $db2";

//Creating Database users (member and admin)
	mysqli_query($conn,"CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';");
	mysqli_query($conn,"GRANT ALL ON $db1.* TO 'admin'@'localhost'");
	mysqli_query($conn,"GRANT ALL ON $db2.* TO 'admin'@'localhost'");
	mysqli_query($conn,"CREATE USER 'member'@'localhost' IDENTIFIED BY 'member';");
	echo '<br>Users created';
	mysqli_close($conn);

$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);

	if (mysqli_connect_errno())
	     echo "Failed to connect to MySQL: " . mysqli_connect_error();
	else
	{
// call or define the Club table create functions here

		//creating the member authentication table-----> ADD FOREIGN KEY IN CREATE TABLE STATEMENT
		$result = mysqli_query($conn,"create table if not exists auth( member_id varchar(25) primary key, email varchar(60), password varchar(60))");
		if($result)	
			echo "<br>Auth table created";
		else
			echo "error creating Auth table";



	}



?>