<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Races</title>
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
          
          
<div id="list" style="margin:20px 260px 0px 196px;">
<?php 
//session_start();
// make a connection
$connection = mysqli_connect("localhost", "admin", "admin","derby");
 
// select the database that we will be using
//mysqli_select_db("derby");
$sql = "SHOW TABLES FROM derby";
$result = mysqli_query($connection,$sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . $connection->error;
    exit;
}
$count=0;
echo "<table>";
echo "<tr><th>RACE NAME</th><th>DATE</th><th>TIME</th></tr>";
while ($row = mysqli_fetch_row($result)) {
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
mysqli_close($connection);
 
?> 
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
	
