	<?php
	include "../race_functions.php";
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1= 'club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
	$sql1="SELECT race_name from club.racing_history";
	$result=mysqli_query($conn,$sql1);
			$race_id = race_open();
          $race = raceid_to_racename($race_id);
          $value= $count;
          $id = "race".$count;
          echo '<option value='.$race.' id='.$id.'>'.$race.'</option>';
			//while($row = mysqli_fetch_assoc($result))
				//{
					//echo $row['race_name'];
					//echo '<option value="'.$row['race_name'].'">'.$row['race_name'].'</option>';
					
				//}
				
?>



