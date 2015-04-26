<?php
date_default_timezone_set('Asia/Kolkata');
function table_update($race)
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$set = false;
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT race_name from club.racing_history where winner IS NULL and second_place IS NULL;";
	$result = mysqli_query($conn1,$sql);
	if(!$result)
		echo $conn1->error;
	while($row=mysqli_fetch_assoc($result))
	{
		if($row['race_name'] == $race)
			$set = true;
	}
	//echo "set = $set<br>";
	return $set;
}



function race_open_check($race)
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$flag = -1;
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
			settype($time_now[1], "integer");
			settype($race_time_now[0], "integer");
			settype($race_time_now[1], "integer");
			$time_r = $race_time_now[0]*60 + $race_time_now[1];
			$time_n = $time_now[0]*60 + $time_now[1];
			$diff = $time_r - $time_n;
			//echo "$diff $time_r $time_n $race<br>";

			//$res= table_update($race);
			//echo $res."<br>";

			if($diff <= 60 and $diff > 0)
				{
					$flag= 0;
					//echo "in if<br>";
				}
			else if($diff < 0 and table_update($race))
			{
				$flag = 1;
				//echo "in else if <br>";
			}
			else
			{
				$flag = -1;
				//echo "in else <br>";
			}
		}
		
	}

	return $flag;
}




function race_close()
{
	echo "in race_close";
	//global $recent_race;
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM club.racing_history";
	$result = mysqli_query($conn1,$sql);

	while($row=mysqli_fetch_assoc($result))
	{
		if(race_open_check($row['race_name'])== 1)
		{
			//last_race($row['race_name']);
			$myfile=fopen("last_race.txt","w");
			fwrite($myfile,$row['race_name']);
			fclose($myfile);
			return $row['race_id'];
		}
	}
	return "No race";

}

function race_open()
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$flag = -1;
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM club.racing_history";
	$result = mysqli_query($conn1,$sql);

	while($row=mysqli_fetch_assoc($result))
	{
		if(race_open_check($row['race_name'])== 0)
		{
			return $row['race_id'];
		}
	}
	return "No race";

}

function last_updated_race()
{
	$myfile=fopen("last_race.txt","r");
	$var = fread($myfile,20);
	//$name = fgets($myfile);
	fclose($myfile);
	echo $var;
	return $var;
}

function raceid_to_racename($race_id)
{
	$dbhost = 'localhost';
	$db1='club';
	$db2='derby';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
	$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
	$flag = -1;
	if (!$conn)
	 {
		    die("Connection failed: " . mysqli_connect_error());
	}
	if (!$conn1)
	 {
		   die("Connection failed: " . mysqli_connect_error());
	}
	if($race_id =="No race")
	{
		return "No race";
	}
	else
	{
		$sql = "SELECT * FROM club.racing_history WHERE race_id ='".$race_id."';";
		$result = mysqli_query($conn1,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row['race_name'];
	}
}

/*testing
$res= race_open();
echo $res."<br>";
$res1 = race_close();
echo $res1."<br>";
echo raceid_to_racename($res1)."<br>";
*/
?>