	<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$sql1="SELECT horse_name from derby.horse";
	$result=mysqli_query($conn,$sql1);

			while($row = mysqli_fetch_assoc($result))
				{
					echo '<option value="'.$row['horse_name'].'">'.$row['horse_name'].'</option>';
					echo $row['horse_name'];
				}
?>



