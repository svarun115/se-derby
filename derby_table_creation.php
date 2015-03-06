<?php
	function race_table()
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

		$tablename ="r".(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(hid int, jid int, time_init TIMESTAMP, time_final TIMESTAMP, pos_init int, pos_final int, primary key(hid,jid))";
		mysqli_query($conn,$sql);
	}

	function horse_table()
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

		$tablename ="h".(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(horse_id int, horse_name varchar(25),primary key(horse_id))";
		mysqli_query($conn,$sql);
	}

	function jockey_table()
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

		$tablename ="j".(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(jockey_id int, jockey_name varchar(25),primary key(jockey_id))";
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
		$date = getdate();
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}

		$tablename ="e".(string)$date["mday"]."_".(string)$date["mon"]."_".(string)$date["year"]."_".(string)$date["hours"].(string)$date["minutes"];
		$sql = "create table if not exists $tablename(event_id int, event_name varchar(25),primary key(event_id))";
		mysqli_query($conn,$sql);
	}


?>
