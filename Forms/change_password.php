<?php
$email=$_POST['email'];
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }

$sql="SELECT password FROM auth WHERE email='$email'";
$bool=false;
$result=mysqli_query($conn,$sql);if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
   	$pwd = $row['password'];
	$bool=true;
   }
else 
   	echo "This e-mail ID is not registered with us";
if($bool)
{
$url=urlencode("http:\\localhost\se-derby\password.html");
$msg="Hello,\n\n\nPlease use this to link to change your password and login to your account.\n\n".$url."\n\n"."Thanks,\nThe Turf Club";
if(mail($email,"Forgotten Password",$msg,"From: sederbymanager@gmail.com"))
	echo "after sent mail call";
	else
		echo "error";
}
?>
