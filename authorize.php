<?php

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';
$value = false;
$email = $_POST['email'];		
$password = $_POST['pwd'];			

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }

$sql="SELECT password FROM auth WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
   	$pwd = $row['password'];
   }
else 
   	echo "Nothing returned";
//Checking retrieved password with entered password'
   //echo $password." ".$pwd;
if ($password == $pwd) {
    //echo '<br>Password is valid!';
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
  header('Location:Forms/home.html');
  //echo '<head><meta url = "Forms/home.html">';

}
 else {
  echo "in else";
  header('Location:Forms/Form_Login.html');
  //echo '</script>';
}
 //echo '</head></html>';



?>
