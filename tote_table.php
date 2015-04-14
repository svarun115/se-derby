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
      
      <div class="panel callout radius">
<div id="list" style="margin:20px 260px 0px 196px;">
<?php
 
// make a connection
$connection = mysql_connect("localhost", "admin", "admin");
 
// select the database that we will be using
mysql_select_db("derby");

// build and execute the query
$sql = "SELECT odds.horse_name, odds.odd, win_odds.odd
FROM odds
INNER JOIN win_odds
ON odds.horse_name=win_odds.horse_name";
$result = mysql_query($sql);
echo "<h3>TOTE TABLE</h3>";
echo "<table>";
echo "<th>Horse</th>";
echo "<th>Odds</th>";
echo "<tr><th>Horse Name</th><th>Place bet</th><th>Win bet</th></tr>";
while($row = mysql_fetch_row($result))
{
	if($row[1]!=NULL || $row[2]!=NULL)
	{
		echo "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th></tr>";
	}
}	
echo "</table>";
// close the connection
mysql_close($connection);
 
?> 
</div> 
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
	
