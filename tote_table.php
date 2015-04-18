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
    <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
   <!--<h1><a href="#">My Site</a></h1>
    </li>-->
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <!--<ul class="right">
      <li class="active"><a href="#">Right Button Active</a></li>
      <li class="has-dropdown">
        <a href="#">Right Button Dropdown</a>
        <ul class="dropdown">
          <li><a href="#">First link in dropdown</a></li>
          <li class="active"><a href="#">Active link in dropdown</a></li>
        </ul>
      </li>
    </ul>!-->

    <!-- Left Nav Section -->
	 <ul class="left">
      <li style="font-weight: bold;"><a href="#">TURF CLUB</a></li>
    </ul>
    
    <!--If session, display this -->
    <?php
    session_start();
if(!empty($_SESSION['name']))
      { 
    echo "<ul class='right'>";
    echo " <li class='has-dropdown not-click'>";
    echo "<a href='#'>".$_SESSION['name']."</a>"; 
    echo "<ul class='dropdown'>";
    echo "<li><a href='signout.php'>Sign out</a></li>";
    echo "</ul>";
    echo"    </ul>";
       }
        else{
    echo "<ul class='right'>";
    echo  "<li><a href='Forms/Form_Signup.html'>SIGNUP</a></li>";
    echo "</ul>";
	echo "<ul class='right'>";
    echo "<li><a href='Forms/Form_Login.php'>LOGIN</a></li>";
    echo "</ul>";}
    ?>
  </section>
</nav>
<br>

    <div class="row">
        <div class="large-12 columns">
          <ul class="round button-group">
            <li><a href="derbyhome.php" class="button">Home</a></li>
            <li><a href="About_Us.php" class="button">About Us</a></li>
            <li class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover1" data-options="is_hover:true">Racing</a>
            <ul id="hover1" class="f-dropdown" data-dropdown-content>
                <li><a href="horse_list.php" >Horses </li>
                <li><a href="jockey_list.php" >Jockeys </li>
                <li><a href="trainer_list.php" >Trainers </li>
                <li><a href="race.php">Races</a></li>
            </ul>                        
            </li>
            <li  class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover2" data-options="is_hover:true">Betting</a>
               <ul id="hover2" class="f-dropdown" data-dropdown-content>
               <li><a href="betting_rules.php" >Betting Help</li>
                <li><a href="Forms/Form_betting.php" >Win</li>
                <li><a href="Forms/Form_Race_name.php" >Place</li>
               </ul>
             </li>
            <li><a href="race_history.php" class="button">Archives</a></li>
            <li><a href="image-gallery.source.php" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.php" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>          
          
      
      <div class="panel callout radius">
<div id="list" style="margin:20px 260px 0px 196px;">
<?php
 /*
// make a connection
//<<<<<<< HEAD
$conn = mysqli_connect('localhost','admin','admin','derby');
 
// select the database that we will be using
//mysql_select_db("derby");
//=======
$connection = mysql_connect("localhost", "admin", "admin");
 
// select the database that we will be using
mysql_select_db("derby");
//>>>>>>> 27c94fd9c0aa489ce384a2d2be2b4a5f2a25cfc1

// build and execute the query
$sql = "SELECT odds.horse_name, odds.odd, win_odds.odd
FROM odds
INNER JOIN win_odds
ON odds.horse_name=win_odds.horse_name";
//<<<<<<< HEAD
$result = mysqli_query($conn,$sql);
if(!$result)
	echo $conn->error;
//=======
$result = mysql_query($sql);
//>>>>>>> 27c94fd9c0aa489ce384a2d2be2b4a5f2a25cfc1
echo "<h3>TOTE TABLE</h3>";
echo "<table>";
echo "<th>Horse</th>";
echo "<th>Odds</th>";
echo "<tr><th>Horse Name</th><th>Place bet</th><th>Win bet</th></tr>";
//<<<<<<< HEAD
while($row = mysqli_fetch_row($result))
//=======
while($row = mysql_fetch_row($result))
//>>>>>>> 27c94fd9c0aa489ce384a2d2be2b4a5f2a25cfc1
{
	if($row[1]!=NULL || $row[2]!=NULL)
	{
		echo "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th></tr>";
	}
}	
echo "</table>";
// close the connection
//<<<<<<< HEAD
//mysql_close($connection);
//=======
mysql_close($connection);
//>>>>>>> 27c94fd9c0aa489ce384a2d2be2b4a5f2a25cfc1
 */

$dbhost = 'localhost';
$db1='club';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);

if (!$conn)
 {
      die("Connection failed: " . mysqli_connect_error());
}
if (!$conn1)
 {
     die("Connection failed: " . mysqli_connect_error());
}



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
	
