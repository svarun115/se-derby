<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1= 'club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
	$sql1="SELECT type from club.racing_history";
	$result=mysqli_query($conn,$sql1);
			while($row = mysqli_fetch_assoc($result))
				{
					//echo $row['race_name'];
					echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';
					
				}
				
?>