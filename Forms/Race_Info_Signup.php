<?php
	include "derby_table_creation.php";
	$race_name=$_POST["name_of_race"];
	//echo $race_name."<br>";
	$date_of_race=$_POST["date_race"];
	//echo $date_of_race."<br>";
	$catg_of_race=$_POST["race_catg"];
	//echo $catg_of_race."<br>";
	$race_type=$_POST["type"];
	//echo $race_type."<br>";
	$temperature=$_POST["temp"];
	//echo $temperature."<br>";
	$humidity=$_POST["humid"];
	//echo $humidity."<br>";
	$wind=$_POST["wind"];
	//echo $wind."<br>";
	$time=$_POST["time"];
	$date=$date_of_race."";
	//echo ''.gettype($date);
	$racename=race_table($date,$time,$race_name);
	session_start();
	$_SESSION['date']=$date;
	$_SESSION['time']=$time;
	$_SESSION['racename']=$racename;
	$tablename="racing_history";
	//echo $tablename;
	$dbhost = 'localhost';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$db = 'club';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
		$sql="insert into $tablename(race_id,race_name, race_date, category, type, temperature, humidity, wind,time) values('$racename','$race_name','$date_of_race','$catg_of_race','$race_type','$temperature','$humidity','$wind','$time')";
		mysqli_query($conn,$sql);
	//include('Form_CurrentRace.php');
 header('Location:Form_CurrentRace.php');		
?>
