<!doctype html>
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
                
          
      <div class="row">
         <div class="large-8 columns" >    
          <ul data-orbit data-options="pause_on_hover:false;
                             slide_number: false;
                             timer: false;
                             variable_height:true;">
              <li> <img src="img/img1.jpg" alt="slide 1" />
               <div class="orbit-caption">Magic Brown being groomed </div> </li>
              <li class="active"> <img src="img/img9.jpg" alt="slide 2" />
               <div class="orbit-caption"> At 2012 Summer Derby </div> </li>
              <li> <img src="img/img10.jpg" alt="slide 3" />
               <div class="orbit-caption"> Horses at the Derby </div> </li>
                </ul>

         <?php  
	include "race_functions.php";
	
	if(!empty($_SESSION['name']))
	{  
	$dbhost = 'localhost';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$db = 'club';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	$m_id=$_SESSION['mem_id'];
	$sql="SELECT * from members where member_id='$m_id'";
	$result=mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
	while($row =  $result->fetch_assoc())
	{
   	$amt = $row['Race_update'];
	}
   }
	echo  " </div>"; 
     echo "<div class='large-3 columns' >"; 
      echo "<div class='panel' style='position:relative; height: 577px; width: 235px;'>";
     echo  "<h4>Member Info</h4>";
     echo "<h5><b>Name :</b>".$_SESSION['name']."</h5>";
     echo "<h5><b>Last Bet :</b>".$amt."</h5>";
    echo  "</div>";
     echo "</div><br>";
	}
	else
	{
	echo  " </div>"; 
     echo "<div class='large-3 columns' >"; 
      echo "<div class='panel' style='position:relative; height: 577px; width: 235px;'>";
     echo  "<h4>Race Status</h4>";
     echo "<h5><b>Open For Betting:".raceid_to_racename(race_open())."</b></h5>";
     echo "<h5><b>Last finished Race:".last_updated_race()."</b></h5>";
	if(last_updated_race()!="No race")
	{
		echo "<h5><b>Winner:".get_first(last_updated_race())."</b></h5>";
     		echo "<h5><b>Second place:".get_second(last_updated_race())."</b></h5>";
	}
    echo  "</div>";
     echo "</div><br>";
	}
	?>
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
<?php
//echo $_SESSION['error'];
if(empty($_SESSION['name']))
{
if(isset($_SESSION['error']))
{
echo "<script type='text/javascript'>";
echo "alert('You are not logged in. You cannot place a bet. Sorry!');";
echo "</script>";
unset($_SESSION['error']);
}
}
?>
<br>
 <?php
           $connection = mysqli_connect("localhost", "admin", "admin","derby");
				// build and execute the query
				$sql = "SELECT horse_name FROM horse";
				$result = mysqli_query($connection,$sql);
				$count =0;
				while($row = mysqli_fetch_row($result))
				{
					$horse_names[$count]= $row[0];
					$count++;
				}
				
				mysqli_close($connection);

 ?>
           
        <div class="row">   
      <div class="row-container" data-equalizer>
       <h4 align="center"><pre> Upcoming Race Favourites :</pre></h4>
        <div class=" large-4 columns" data-equalizer-watch>
           <img src="img/img4.jpg" style="height:240px; width:300px" alt="Image1"/>
           <h5> 
          <?php echo "$horse_names[0]"; ?>
           </h5>
     <!--      <p>About Horse1</p> -->
        </div> 
        
        <div class="large-4 columns" data-equalizer-watch>
           <img src="img/img5.jpg" style="height:240px; width:300px" alt="Image2"/>
           <h5><?php echo "$horse_names[1]"; ?></h5>
     <!--      <p>About Horse2</p>  -->
        </div>
        
        <div class=" large-4 columns" data-equalizer-watch>
           <img src="img/img6.jpg" style="height:240px; width:300px" alt="Image3"/>
           <h5><?php echo "$horse_names[2]"; ?></h5>
     <!--      <p>About Horse3</p>  -->
        </div>     
      </div>
	  </div>
      
      <div class="row">       
          <div class="large-12 columns">
          <div class="panel">
             <h3>Welcome To The Turf Club</h3>
             <p>
                    If the Bangalore Race Course is considered as one of the best in the country for
                    the challenge it poses both to the horse and to the riders, the credit should go
                    to the successive administrators who have wisely made use of the natural and undulating
                    contours of the land. The Bangalore Race Course is probably the only one on the
                    world where a limited space of barely 85 acres has been so comprehensively utilised
                    to provide facilities such as stabling for over 1000 horses, three training tracks,
                    an equine swimming pool, training schools, walking rings, a veterinary hospital
                    and even an amateur riding school.</p>
             <button class="small round button" onclick="location.href='About_Us.php';">Learn More</button>
          </div>      
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
    
  </body>
</html>
