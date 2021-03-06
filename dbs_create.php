<?php
include 'Forms/derby_table_creation.php';
echo "WELCOME TO DERBY MANAGEMENT TOOL ";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
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
		
			$sql = "CREATE TABLE IF NOT EXISTS events_history (event_id int(11) NOT NULL,event_description longtext NOT NULL,date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY (event_id))";
			mysqli_query($conn,$sql);
			$sql = " CREATE TABLE IF NOT EXISTS horse_data (horse_id int(11) NOT NULL AUTO_INCREMENT,horse_name varchar(25) NOT NULL,PRIMARY KEY (horse_id))";
			mysqli_query($conn,$sql);
			$sql = "CREATE TABLE IF NOT EXISTS jockey_data (jockey_id int(11) NOT NULL DEFAULT '0',jockey_name int(11) NOT NULL,PRIMARY KEY (jockey_id))";
			mysqli_query($conn,$sql);
			$sql = " CREATE TABLE IF NOT EXISTS members ( member_id int(11) NOT NULL AUTO_INCREMENT, ph_no bigint(11) NOT NULL, name varchar(25) NOT NULL, gender varchar(1) NOT NULL, dob date NOT NULL,address varchar(50) NOT NULL,member_type int(11) NOT NULL,picture varchar(25) NOT NULL, Race_update DOUBLE(10, 4) DEFAULT '0', PRIMARY KEY (member_id))";
			mysqli_query($conn,$sql);
			$sql = "CREATE TABLE IF NOT EXISTS racing_history ( race_id varchar(30), race_name varchar(30), race_date date,time varchar(25), category int NOT NULL,temperature double NOT NULL,humidity double NOT NULL,wind double NOT NULL,type int(1),winner varchar(30) DEFAULT NULL,second_place varchar(30) DEFAULT NULL,PRIMARY KEY (race_id))";
			mysqli_query($conn,$sql);
			$sql="CREATE TABLE IF NOT EXISTS account(member_id int(11), balance float(10), primary key(member_id))";
			if(!mysqli_query($conn,$sql))
				echo $conn->error;
			horse_table();
			jockey_table();
			trainer_table();
			
			
			//$sql = "CREATE TABLE IF NOT EXISTS `verification` (`member_id` int(11) NOT NULL,`email` varchar(50) NOT NULL,`password` varchar(25) NOT NULL,`salt` varchar(25) NOT NULL,PRIMARY KEY (`member_id`,`email`))";
		//creating the member authentication table-----> ADD FOREIGN KEY IN CREATE TABLE STATEMENT
		$result = mysqli_query($conn,"create table if not exists auth( member_id int(11), email varchar(60), password varchar(60),primary key(email) ,foreign key(member_id) references members(member_id) on update cascade on delete cascade)");
if(!$result)
	echo $conn->error;
		//$sql = "ALTER TABLE auth ADD CONSTRAINT fk1 FOREIGN KEY (member_id) REFERENCES members (member_id) ON DELETE CASCADE ON UPDATE CASCADE";
		//mysqli_query($conn,$sql);

		if($result)	
			echo "<br>Auth table created";
		else
			echo "error creating Auth table";



	}



?>
