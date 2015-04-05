<?php
	$dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$sql= "SELECT h.horse_name,j.jockey_name,t.trainer_name from horse h,jockey j,trainer t where h.horse_name=j.horse_name and h.horse_name=t.horse_name ";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
        if ($row) {
            echo(
                "<td width='80px'>"
                .$row['horse_name']
                ."</td>"
            );
			echo(
                "<td width='80px'>"
                .$row['jockey_name']
                ."</td>"
            );
			echo(
                "<td width='80px'>"
                .$row['trainer_name']
                ."</td>"
            );
        }
		 echo "</tr>";
    }
   

?>
