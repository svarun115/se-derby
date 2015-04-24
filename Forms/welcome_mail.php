<?php
function welcome_send($name,$email,$pwd)
{
	//echo $name." ".$email." ".$pwd;
	$msg="Hello ".$name.",\n\rWelcome to our Derby Club. We are pleased to have you as a member. Now you can place your bets on Derby races from anywhere in the world!\n\n\rYour login details are:\n\n\rUsername: ".$email."\n\rPassword:".$pwd."\n\n\rBest regards,\n\rDerby Manager";
	if(mail($email,"Welcome to the Turf Club",$msg,"From: sederbymanager@gmail.com"))
	echo "after sent mail call";
	else
		echo error_get_last();
}
?>
