<?php
	function race_table($name)
	{
		echo "Creating Race Table<br>";
		date_default_timezone_set('Asia/Kolkata');		
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		$tablename ="r_".$name."_".(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"];//."_".(string)$date["hours"].(string)$date["minutes"];
		//$sql = "create table if not exists $tablename(id int(11) NOT NULL AUTO_INCREMENT,name varchar(30), date_race varchar(20), catg varchar(20), type int, temp double, humidity double, wind double, primary key(id,name))";
		$sql = "create table if not exists $tablename(hid int, jid int, time_init TIMESTAMP, time_final TIMESTAMP, pos_init int, pos_final int, primary key(hid,jid))";
		if(mysqli_query($conn,$sql))
		{
			echo "success";

		}
		echo "done";
		return $tablename;
	}

	function horse_table($name)

	{
		echo "Creating Horse Table<br>";
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="h_".$name.(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(horse_id int, horse_name varchar(25),primary key(horse_id))";
		mysqli_query($conn,$sql);
	}

	function jockey_table($name)
	{
		echo "Creating Horse Table<br>";
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="j_".$name.(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(jockey_id int, jockey_name varchar(25),primary key(jockey_id))";
		mysqli_query($conn,$sql);
	}

	function event_table($name)
	{
		echo "Creating Event Table<br>";
		date_default_timezone_set('Asia/Kolkata');
		$dbhost = 'localhost';
		$dbuser = 'admin';
		$dbpass = 'admin';
		$db = 'derby';
		$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="e_".$name.(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(event_id int, event_name varchar(25),primary key(event_id))";
		mysqli_query($conn,$sql);
	}


?>
