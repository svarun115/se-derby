<?php
$pwd=$_POST['password'];
$hash=password_hash($pwd);
$email=$_POST['email'];

   $sql3="UPDATE club.auth SET password='$hash' WHERE email='$email'";
   mysqli_query($conn,$sql3);
?>
