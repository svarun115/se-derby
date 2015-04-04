<?php

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'admin';

$data = file_get_contents("php://input");
$json = json_decode(data);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'derby');
if (mysqli_connect_errno())
	     {
	     	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	     	die();
	      }
echo "<br>Connection successful";

$horse = $json->{'horse'};
$jockey = $json->{'jockey'};
$trainer = $json->{'trainer'};
$breeder = $json->{'breeder'};
$weight = $json->{'weight'};
$color = $json->{'color'};
$age = $json->{'age'};
$sex = $json->{'sex'};
$h_mounts = $json->{'h_mounts'};
$h_wins = $json->{'h_wins'};
$h_second = $json->{'h_second'};
$h_third = $json->{'h_third'};
$h_mounts = $json->{'h_mounts'};
$t_wins = $json->{'t_wins'};
$t_second = $json->{'t_second'};
$t_third = $json->{'t_third'};
$t_percent = $json->{'t_percent'};
$j_mounts = $json->{'j_mounts'};
$j_wins = $json->{'j_wins'};
$j_second = $json->{'j_second'};
$j_third = $json->{'j_third'};
$j_percent = $json->{'j_percent'};

		


echo $horse;
HttpResponse::send();

/*The data is being recieved one horse at a time.
Run the extract_data.py to file to verify that the data is being received by the PHP script.
This PHP script must be at location '/localhost/write_data.php'. Modify the url on the python script accordingly.*/

