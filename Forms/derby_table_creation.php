<?php
	//$derby_name="";

	function race_table($date,$time)
	{
		echo "Creating Race Table<br>";
		date_default_timezone_set('Asia/Kolkata');		
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$date_array = explode("-",$date);
		$time_array = explode(":",$time);
		$derby_name=$date_array[0]."_".$date_array[1]."_".$date_array[2];
		$tablename ="r_".$derby_name."_".$time_array[0]."_".$time_array[1];
		//horse_table($derby_name);
		//jockey_table($derby_name);
		//trainer_table($derby_name);

		echo $tablename."<br>";//."_".(string)$date["hours"].(string)$date["minutes"];
		//$sql = "create table if not exists $tablename(id int(11) NOT NULL AUTO_INCREMENT,name varchar(30), date_race varchar(20), catg varchar(20), type int, temp double, humidity double, wind double, primary key(id,name))";
		$sql = "create table if not exists $tablename(horse_name varchar(30), jockey_name varchar(30), trainer_name varchar(30),time_init TIME, time_final TIME, track int, pos_final int, primary key(horse_name,jockey_name, trainer_name),foreign key(horse_name) references horse(horse_name), foreign key(jockey_name) references jockey(jockey_name),foreign key(trainer_name) references trainer(trainer_name) )";
		mysqli_query($conn,$sql);

	}

function trainer_table($derby_name)
{
	echo "Creating Trainer Table<br>";
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
		$sql = "create table if not exists $tablename(trainer_name varchar(25),primary key(trainer_name))";
		mysqli_query($conn,$sql);	
}
	function horse_table($derby_name)

	{
		echo "Creating Horse Table<br>";
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
		$sql = "create table if not exists $tablename(horse_name varchar(25),primary key(horse_name))";
		mysqli_query($conn,$sql);
	}

	function jockey_table($derby_name)
	{
		echo "Creating Horse Table<br>";
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
		$sql = "create table if not exists $tablename(jockey_name varchar(25),primary key(jockey_name))";
		mysqli_query($conn,$sql);
	}

	function event_table()
	{
		echo "Creating Event Table<br>";
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

	race_table("Hello","11-03-2015","10:30:00");
?>
