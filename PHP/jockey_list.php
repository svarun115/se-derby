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
$connection = mysql_connect("localhost", "root", "");
 
// select the database that we will be using
mysql_select_db("derby");
 
// build and execute the query
$sql = "SELECT * FROM jockey";
$result = mysql_query($sql);
 $var1=1;
echo "<table>";
echo "<tr><th>Jockey Name</th><th>Mounts</th><th>Wins</th><th>Second</th><th>Third</th><th>Percent</th></tr>";
while($row = mysql_fetch_row($result))
{
echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td>
      <td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>\n";
      $var1++;
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
	