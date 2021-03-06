<?php
	//$derby_name="";
//include 'race_details.php';
	function race_table($date,$time,$name)
	{
		
		date_default_timezone_set('Asia/Kolkata');		
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			"Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$date_array = explode("-",$date);
		$time_array = explode(":",$time);
		$derby_name=$date_array[0]."_".$date_array[1]."_".$date_array[2];
		$tablename ="r_".$derby_name."_".$time_array[0]."_".$time_array[1]."_".$name;
		//copy("template.php",$tablename.".php");
		//write_file($tablename.".php");
		//horse_table($derby_name);
		//jockey_table($derby_name);
		//trainer_table($derby_name);

		
		$sql = "create table if not exists $tablename(horse_name varchar(30), jockey_name varchar(30), trainer_name varchar(30),time_init TIME, time_final TIME, track int, pos_final int, primary key(horse_name,jockey_name, trainer_name),foreign key(horse_name) references horse(horse_name), foreign key(jockey_name) references jockey(jockey_name),foreign key(trainer_name) references trainer(trainer_name) )";
		mysqli_query($conn,$sql);

		return $tablename;

	}

function trainer_table()
{
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		//$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="trainer";
		$sql = "create table if not exists $tablename(trainer_name varchar(25), mounts int(10), wins int(10), second int(10), third int(10), percent int(10),primary key(trainer_name))";
		if(!mysqli_query($conn,$sql))
			echo $conn->error;	
}
	function horse_table()

	{
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		//$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="horse";
		$sql = "create table if not exists $tablename(horse_name varchar(25), breeder varchar(25),weight float(10),power float(20), age float(20), colour varchar(25), sex varchar(10), mounts int(10), wins int(10), second int(10), third int(10),primary key(horse_name))";
		mysqli_query($conn,$sql);
	}

	function jockey_table()
	{
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		//$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="jockey";//.$name.(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(jockey_name varchar(25), mounts int(10), wins int(10), second int(10), third int(10), percent int(10),primary key(jockey_name))";
		if(!mysqli_query($conn,$sql))
			echo $conn->error;
	}

	function event_table()
	{
		
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		//$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="e_".$derby_name;//$name.(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(event_name varchar(25),primary key(event_name))";
		mysqli_query($conn,$sql);
	}

?>
