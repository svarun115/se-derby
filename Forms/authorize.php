<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'club';
$value = false;
$email = $_POST['email'];		
$password = $_POST['pwd'];
$client = $_POST['client'];	

	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
$m_id=0;
$sql="SELECT * FROM auth WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if(!$result)
	{
	echo $conn->error;
}

if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
	{
   	$pwd = $row['password'];
	$m_id=$row['member_id'];
	echo "Member ".$m_id;
	}
   }
else 
   	{
   		echo '<script type = "text/javascript"> alert("Invalid email");</script>' ;
   	}

//Checking retrieved password with entered password'
echo $password." ".$pwd;

$sql1="SELECT name from members where member_id='$m_id'";
$result1=mysqli_query($conn,$sql1);
if(!$result1){
	echo $conn->error;
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
} else {
  $value= false;
  echo '<script type = "text/javascript"> alert("login failed");</script>' ;
}


if($client == 'android'){
/*
Send response to the android client
*/
$data = array();
$data['success'] = $value;
HttpResponse::setContentType('application/json');
HttpResponse::setData(json_encode($data));
HttpResponse::send();
}
else if ($client=='web')
{

if($value){
  echo "in if";
  header('Location:/se-derby/derbyhome.php');
}
 else if(!$value){
 echo "in else";
 header('Location:Form_Login.html');
}
}
?>
