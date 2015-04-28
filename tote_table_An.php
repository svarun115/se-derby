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
    echo "<li><a href='Forms/Form_Login.html'>LOGIN</a></li>";
    echo "</ul>";}
    ?>
  </section>
</nav>
<br>

   
      
                <script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation({
  orbit: {
    animation: 'slide',
    timer_speed: 1000,
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: true,
    bullets: false
  }
});
</script>
           
          
      
      <div class="panel callout radius">
<div id="list" style="margin:20px 260px 0px 196px;">
<form action = "/se-derby/Forms/Form_Inplace_Betting_An.php" method = "post">
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
//session_start();
//$race=$_POST["race_name"];
include "race_functions.php";
//$race=$_POST["race_name"];
$race = raceid_to_racename(race_open());
$_SESSION["race"]=$race;
$flag = 0;          
         // echo "<h2>".$race."</h2>";
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
          $sql = "SELECT race_id FROM racing_history WHERE race_name ='".$race."';";
          $result = mysqli_query($conn1,$sql);
          while($row=mysqli_fetch_assoc($result)) {
            $race_table=$row["race_id"];
           // echo $race_table;
          }
          $_SESSION["race"]=$race;
          $_SESSION["race_table"]=$race_table;
$table_name= $race."_odds_place";

$sql1 = "SELECT horse_name from $race_table";
if(!( $result1=mysqli_query($conn,$sql1)))
  echo $conn->error;
$count = 0;
$horse_name=array();
while($row=mysqli_fetch_assoc($result1))
    {
             // echo $row["horse_name"];
    $horse_name[$count++] = $row["horse_name"];
    }
$sql = "CREATE TABLE IF NOT EXISTS $table_name (horse_name varchar(25) NOT NULL,odds varchar(25),odds_fraction float(20),PRIMARY KEY (horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
if(mysqli_query($conn,$sql))
{
  $flag = 1;
}
  //echo "success";
  //echo "UGH!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
if($flag){

foreach ($horse_name as $hname) {
$sql_get_details = "SELECT * from derby.horse where horse_name ='".$hname."';";
$result_get_details = mysqli_query($conn,$sql_get_details);
$row=mysqli_fetch_assoc($result_get_details);
//$wins=mysqli_fetch_assoc($result_get_details)['second'];
$wins= $row['wins'];
$mounts = $row['mounts'];
//echo "$wins $mounts<br>";
$odds=$wins."-".$mounts;
$sql="INSERT into $table_name(horse_name,odds,odds_fraction) values ('$hname','$odds',3.05)";
  mysqli_query($conn,$sql);
   //echo "success";
  //else
    //echo $conn->error;
   }
}
//code:
$race_table=$_SESSION["race_table"];
$horse_table="derby.horse";
$table_win="derby.win_odds";
$sql = "SELECT * FROM $horse_table, $race_table, $table_name where 
 $horse_table.horse_name = $race_table.horse_name and $horse_table.horse_name = $table_name.horse_name ;";
if(!($result = mysqli_query($conn,$sql)))
  $conn->error;
 $var1=1;
echo "<table>";
echo "<tr><th>Horse Name</th><th>Breeder</th><th>Weight</th><th>Power</th><th>Age</th><th>Color</th><th>Sex</th>
<th>Mounts</th><th>Wins</th><th>Second</th><th>Third</th><th>Jockey Name</th><th>Trainer Name</th>
<th>Odds For Position Betting</th></tr>";
while($row = mysqli_fetch_row($result))
{
  //echo "in while";
echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td>
      <td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
      <td>$row[10]</td><td>$row[12]</td><td>$row[13]</td><td>$row[19]</td></tr>\n";
      $var1++;
}
echo "</table>";


// close the connection
mysqli_close($conn);




?>
<input type = "submit" value = "Continue"/>
</form> 
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
  
