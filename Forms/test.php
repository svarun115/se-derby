	<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	session_start();
	$race=$_SESSION['race'];//user session
	echo $race;
	$race=strtolower($race);
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
?>



