<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
        <div class="large-12 columns">
			
          <ul class="rectangle button-group">
            <li><a href="#" class="button">Home</a></li>
            <li><a href="#" class="button">About Us</a></li>
            <li><a href="#" class="button">Racing</a>
			</li>
            <li><a href="#" class="button">Fixtures</a></li>
            <li><a href="#" class="button">Archives</a></li>
            <li><a href="#" class="button">Photo Gallery</a></li>
            <li><a href="#" class="button">Contact us</a></li>
          </ul>
		  
         </div>
      </div>
<div id="list" style="margin:20px 260px 0px 196px;">
<?php 
session_start();
// make a connection
$connection = mysql_connect("localhost", "admin", "admin","derby");
 
// select the database that we will be using
//mysqli_select_db("derby");
$sql = "SHOW TABLES FROM derby";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . $connection->error;
    exit;
}
$count=0;
echo "<table>";
echo "<tr><th>RACE NAME</th><th>DATE</th><th>TIME</th></tr>";
while ($row = mysql_fetch_row($result)) {
    //echo "Table: ".$row[0]."\n";
    $table_array=explode("_",$row[0]);
    //echo $table_array[0]."<br>";
    if($table_array[0]=='r')
	{
		//echo "In IF\n";	
		$date= $table_array[2]."-".$table_array[3]."-".$table_array[1];
		$time=$table_array[4].":".$table_array[5];
		$name=$table_array[6];
		echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td><a href=display.php?sub=$row[0]>$name</td><td>$date</td>
      <td>$time</td></tr>\n";
	$count++;
	}
}
echo "</table>";

// close the connection
mysql_close($connection);
 
?> 
</div> 
<footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-6 columns">
              <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
              <ul class="inline-list right">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
                <li><a href="#">Link 7</a></li>
              </ul>
            </div>
          </div>
        </div> 
      </footer>
    
 <style type=”text/css”>
th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;

}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
</style>
	
	</body>
	</html>
	
