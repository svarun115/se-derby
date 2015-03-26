<?php

$data = file_get_contents("php://input");
$data="[".$data."]";
$arr=json_decode($data,true);
echo $data;
HttpResponse::send();

/*The data is being recieved one horse at a time.
Run the extract_data.py to file to verify that the data is being received by the PHP script.
This PHP script must be at location '/localhost/write_data.php'. Modify the url on the python script accordingly.*/
?>
