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
	$sql="SELECT balance from account where member_id='$m_id'";
	$result=mysqli_query($conn,$sql);
	echo $conn->error;
	
	
	$bal=mysqli_fetch_assoc($result)['balance'];
	//echo $bal;
	if($bal!='')
	{
	$balance=$bal+$balance;
	$sql="UPDATE account set balance='$balance' where member_id='$m_id'";
	mysqli_query($conn,$sql);
	echo $conn->error;
	
	}
	else
	{
	$sql="INSERT into account (balance,member_id) values('$balance','$m_id')";
	mysqli_query($conn,$sql);
	echo $conn->error;
	
	
	}
	//echo "Successful Update";
	echo "<script type='text/javascript'>alert('Account updated!');</script>";
	header( "refresh:1;url=/se-derby/admin_form.html" );
	
?>
