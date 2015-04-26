	<?php
	/*
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	session_start();
	$race=$_SESSION['race'];//user session
	echo $race;
	//$race=strtolower($race);
	$sql = "SHOW TABLES FROM derby";
	$result = mysqli_query($conn,$sql);

	if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . $connection->error;
    exit;
	}

$table="0";
	while ($row = mysqli_fetch_row($result)) {
    $table_array=explode("_",$row[0]);	
    if($table_array[0]=='r')
	{
		//echo "In IF\n";	
		$date= $table_array[2]."-".$table_array[3]."-".$table_array[1];
		$time=$table_array[4].":".$table_array[5];
		$name=$table_array[6];
		echo $race;
		echo $name;
		if($race==$name)
		{
			$table=$row[0];
			break;
		}

	}
}
	
	$sql="SELECT horse_name from $table";
	$res=mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res))
				{
					echo '<option value="'.$row['horse_name'].'">'.$row['horse_name'].'</option>';
					//echo $row['horse_name'];
				}
*/

				//<?php
          $race=$_POST["race_name"];
          //echo "<h2>".$race."</h2>";
          $dbhost = 'localhost';
          $db2='derby';
          $db1='club';
          $dbuser = 'admin';
          $dbpass = 'admin';
          $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
           if (!$conn1) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $race_table=$_SESSION["race_table"];
        $sql1 = "SELECT horse_name from $race_table";
         if(!( $result1=mysqli_query($conn,$sql1)))
            echo $conn->error;
        $count = 1;
          while($row=mysqli_fetch_assoc($result1))
          {
           // echo $row["horse_name"];
          $id= "horse".$count;
         echo '<option value="'.$row["horse_name"].'" id='.$id.'>'.$row["horse_name"].'</option>';
          //echo "hello";
          $count++;
          }
?>



