<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';
$value = false;
$email = $_POST['email'];		
$password = $_POST['pwd'];	

$error = false;		//Part of response to send back to the android client
						// Part of response to send back to the android client
	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	$error = true;
	     	die();
	      }
$m_id=0;
$sql="SELECT * FROM auth WHERE email='$email'";

$result=mysqli_query($conn,$sql);
if(!$result)
	{
	echo $conn->error;
	$error = true;
}

if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
	{
   	$pwd = $row['password'];
	$m_id=$row['member_id'];
	echo "Member ".$m_id;
	//$me
	}
   }
else 
   	echo "Nothing returned";
//Checking retrieved password with entered password'
echo $password." ".$pwd;

$sql1="SELECT name from members where member_id='$m_id'";
$result1=mysqli_query($conn,$sql1);
if(!$result1){
	echo $conn->error;
	$error = true;
}

$row1=mysqli_fetch_assoc($result1);
  $name=$row1['name'];
  $_SESSION["name"]=$name;
 	echo "Name".$_SESSION["name"];
  $_SESSION["mem_id"]=$m_id;
  echo "done";
//}
if (password_verify($password, $pwd)){//$password == $pwd) {
   echo '<br>Password is valid!';
    $value =true;
    echo '<script type = "text/javascript"> alert("login Successful");</script>' ;
    //header("location:login_success.php");
} else {
  $value= false;
  echo '<script type = "text/javascript"> alert("login failed");</script>' ;
   // echo 'Invalid password.';
}
//echo '<html>';
//echo '<head>';
//echo $value;


/*
Send response to the android client
*/

HttpResponse::setContentType('application/json');
HttpResponse::send('success' = $value);


if($value){
  echo "in if";
  header('Location:/se-derby/derbyhome.php');
  //echo '<head><meta url = "Forms/home.html">';

}
 else {
 echo "in else";

  header('Location:Form_Login.html');
  //echo '</script>';
}
 //echo '</head></html>';



?>
