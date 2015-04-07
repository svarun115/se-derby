	<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1= 'club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
	$sql1="SELECT race_name from club.racing_history";
	$result=mysqli_query($conn,$sql1);
			while($row = mysqli_fetch_assoc($result))
				{
					//echo $row['race_name'];
					echo '<option value="'.$row['race_name'].'">'.$row['race_name'].'</option>';
					
				}
				
?>



