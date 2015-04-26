<?php
include "../race_functions.php";
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db1 = 'derby';
$db2 = 'club';
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$db2);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
//echo "<br>Connection successful";
//if($conn1)
	//echo "Connection 2 successful";
$race_id=race_close();//call function for assignment
$race = raceid_to_racename($race_id);
if($race == "No race")
{
	echo "<script type='text/javascript'>alert('Could not be updated as there are no races to update!');</script>";
	header( "refresh:1;url=/se-derby/admin_form.html" );
}
//echo $race;
else
{
	$sql = "SELECT horse_name from $race_id" ;	
	$res=mysqli_query($conn,$sql);
	$horse="";
	if($res){
		while($row=mysqli_fetch_array($res,MYSQLI_NUM))
		{
			$horse=$horse.":".$row[0];
		}
		$horse=explode(":",$horse);
		//foreach($horse as $name)
		//echo $name;
		$h=array_rand($horse,3);
		$first=$horse[$h[1]];
		$second=$horse[$h[2]];
		//echo $first;
		//echo $second;
		$sql1="UPDATE racing_history set winner='$first' where race_id = '$race_id'";
		$sql2="UPDATE racing_history set second_place='$second'where race_id = '$race_id'";
		mysqli_query($conn1,$sql1);
		mysqli_query($conn1,$sql2);
		include 'win_winners.php';
		include 'inplace_payoff.php';
		//$sql="alter table $db1.$race_id rename $db2.$race_id";
		//mysqli_query($conn,$sql);
		echo "<script type='text/javascript'>alert('Winners updated!');</script>";
		header( "refresh:1;url=/se-derby/admin_form.html" );
		//header('Location:/se-derby/admin_form.html');
	}
	else
	{
		echo $conn->error;
		echo "Mysql query failed";
	}
}	
?>

