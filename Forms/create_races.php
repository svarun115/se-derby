<?php
$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';
$db = 'derby';
session_start();
$tablename=(String)$_SESSION['racename'];
$count=1;
$var=2;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	foreach ($_POST as $key => $value)
	{
		if($count==1)
			$horse=$value;
		else if($count==2)
			$jockey=$value;
		else if($count==3)
			$trainer=$value;
		else if($count==4)
		{
			$track=$value;
			$sql="INSERT INTO derby.".$_SESSION['racename']." (horse_name, jockey_name, trainer_name, time_init, time_final, track, pos_final) VALUES ('$horse','$jockey,'$trainer', '$var','$var','$track','$var')";
			if(!mysqli_query($conn,$sql))
				echo $conn->error;
			$count=0;
		}
		$count++;
		 echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	}

	
?>