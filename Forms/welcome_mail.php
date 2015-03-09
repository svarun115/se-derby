<?php
function welcome_send($name,$email,$pwd)
{
	$msg="Hello ".$name.",\n\rWelcome to our Derby Club. We are pleased to have you as a member. Now you can place your bets on Derby races from anywhere in the world!\n\n\rYour login details are:\n\n\rUsername: ".$email."\n\rPassword:".$pwd."\n\n\rBest regards,\n\rDerby Manager";
	mail($email,"Subject",$msg,"From: sederbymanager@gmail.com");
}
?>