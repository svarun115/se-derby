<?php
echo "AUTHORIZING LOGIN ";

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';

$email = 'abc@example.com';		//CHANGE TO POST METHOD ACCEPT
$password = 'welcome';			//CHANGE TO POST METHOD ACCEPT

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
echo "<br>Connection successful";

$sql="SELECT password FROM auth WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
   	$pwd = $row['password'];
   }
else 
   	echo "Nothing returned";
//Checking retrieved password with entered password
if (password_verify($password, $pwd)) {
    echo '<br>Password is valid!';
   // header("location:login_success.php");
} else {
    echo 'Invalid password.';
}




