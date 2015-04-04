<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';
$value = false;
$email = $_POST['email'];		
$password = $_POST['pwd'];	

//if($email=='admin' && $password=='admin')
 //header('Location:/se-derby/admin_home.html');	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }

$sql="SELECT password FROM auth WHERE email='$email'";
$sql1="SELECT member_id from members where email='$email'";

$result=mysqli_query($conn,$sql);
$result1=mysqli_query($conn,$sql1);

if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
   	$pwd = $row['password'];
   }
else 
   	echo "Nothing returned";
//Checking retrieved password with entered password'
   //echo $password." ".$pwd;

//while($row1=$result1->fetch_assoc())
$row1=mysqli_fetch_assoc($result);
  $member_id_temp=$row1['member_id'];
  $_SESSION["mem_id"]=$member_id_temp;
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
echo $value;
if($value){
  //echo "in if";
  header('Location:/se-derby/derbyhome.html');
  //echo '<head><meta url = "Forms/home.html">';

}
 else {
  echo "in else";
  header('Location:Form_Login.html');
  //echo '</script>';
}
 //echo '</head></html>';



?>
