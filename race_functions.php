<?php
date_default_timezone_set('Asia/Kolkata');
function race_name()
{
	//pick a race name and return it
}
function race_open($race)
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$flag = false;
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}

	$day=date("Y-m-d");
	$time = date("h:i:sa");
	$time= date("H:i", strtotime($time));
	//echo $day."<br>";
	//echo $time."<br>";
	$sql = "SELECT * FROM club.racing_history where race_name = '".$race."';";
	$result = mysqli_query($conn1,$sql);

	while($row=mysqli_fetch_assoc($result))
	{
		//echo $row['race_name']." ".$row['race_date']." ".$row['time']." ";
		if($row['race_date'] == $day)
		{
			$race_time=$row['time'];
			//echo "$race_time<br>";
			settype($time, "string");
			$time_now = explode(":", $time);
			//echo $time_now[0]." ".$time_now[1]."<br>";
			$race_time_now = explode(":", $race_time);
			settype($time_now[0], "integer");
			settype($race_time_now[0], "integer");
			$diff = $race_time_now[0] - $time_now[0];
			if($diff ==0)
				$flag=true;
			else
				$flag = false;
		}
		
	}

	return $flag;
}

/*function stop_race($race)
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$flag = false;
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}

	$day=date("Y-m-d");
	$time = date("h:i:sa");
	$time= date("H:i", strtotime($time));
	//echo $day."<br>";
	//echo $time."<br>";
	$sql = "SELECT * FROM club.racing_history where race_name = '".$race."';";
	$result = mysqli_query($conn1,$sql);

	while($row=mysqli_fetch_assoc($result))
	{
		//echo $row['race_name']." ".$row['race_date']." ".$row['time']." ";
		if($row['race_date'] == $day)
		{
			$race_time=$row['time'];
			//echo "$race_time<br>";
			settype($time, "string");
			$time_now = explode(":", $time);
			//echo $time_now[0]." ".$time_now[1]."<br>";
			$race_time_now = explode(":", $race_time);
			settype($time_now[0], "integer");
			settype($race_time_now[0], "integer");
			$diff = $race_time_now[0] - $time_now[0];
			if($diff < 0 or $diff > 0)
				$flag=true;
			else
				$flag = false;
		}
		
	}

	return $flag;

}


*/
$res= race_open("mcdowells");
if($res)
{echo "Race open for betting";}
else
{echo "Race closed for betting";}
?>