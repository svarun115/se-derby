<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
	$db='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$balance=$_POST["balance"];
	$email=$_POST["email"];
	$sql1="SELECT member_id from auth where email='$email'";
	$result=mysqli_query($conn,$sql1);
	$m_id=mysqli_fetch_assoc($result)['member_id'];
	$sql="UPDATE account set Balance='$balance' where member_id='$m_id'";
	mysqli_query($conn,$sql);
	echo "Successful Update";
?>
