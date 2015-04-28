<?php

/*Steps :
create databases
start cron(?)
create 3 demo users
create race - entries
start timer to start betting 
start timer to stop betting
display starting positons and final odds
start race
start timer to stop race
update results via random winners
display final standings 
notify the members of winnings/payoffs
update database*/

function create_user($name,$email,$pwd,$ph_no,$){
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
	echo "$member_id,$hash,$email";
	$sql="INSERT into auth values('$member_id','$email','$hash')";
	$result=mysqli_query($conn,$sql);
	if(!$result){
		echo "<br>Error";
	}
	else
		echo "Success";
	mysqli_close($conn);
}

function create_race()
{
	
}

//set up the club and derby database
echo "Calling dbs_create.php to create databases<br>";
include '../dbs_create.php';

echo "<br>Creating 4 users : 2 members (Member1, Member2), 1 clerk (Clerk1), 1 admin(Admin)<br>";
create_user("Member1","member1@example.com","pass1");
create_user("Member2","member2@example.com","pass2");
//insert code to add clerk and admin

echo "Creating a race with deatils as follows :<br>";
create_race();

echo "Starting timer";




?>