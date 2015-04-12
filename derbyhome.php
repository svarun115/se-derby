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
            <li><a href="#" class="button">Home</a></li>
            <li><a href="About_Us.html" class="button">About Us</a></li>
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
               <li><a href="betting_rules.html" >Betting Help</li>
                <li><a href="/se-derby/Forms/Form_betting.php" >Win</li>
                <li><a href="/se-derby/Forms/Form_Race_name.php" >Place</li>
               </ul>
             </li>
            <li><a href="race_history.php" class="button">Archives</a></li>
            <li><a href="Photo_gallery.html" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.html" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>          
          
      <div class="row">
         <div class="large-12 large-centered columns" >    

          <ul data-orbit data-options="pause_on_hover:false;
                             slide_number: false;
                             timer: false;
                             variable_height:true;">
              <li> <img src="img/img1.jpg" alt="slide 1" />
               <div class="orbit-caption"> Caption One. </div> </li>
              <li class="active"> <img src="img/img9.jpg" alt="slide 1" />
               <div class="orbit-caption"> Caption Two. </div> </li>
              <li> <img src="img/img10.jpg" alt="slide 1" />
               <div class="orbit-caption"> Caption Three. </div> </li>
                </ul>
               
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
      <div class="row-container" data-equalizer>
        <div class=" large-4 columns" data-equalizer-watch>
           <img src="img/img4.jpg" alt="Image1"/>
           <h3>Horse 1</h3>
           <p>About Horse1</p>
        </div> 
        
        <div class="large-4 columns" data-equalizer-watch>
           <img src="img/img5.jpg" alt="Image2"/>
           <h3>Horse 2</h3>
           <p>About Horse2</p>
        </div>
        
        <div class=" large-4 columns" data-equalizer-watch>
           <img src="img/img6.jpg" alt="Image3"/>
           <h3>Horse 3</h3>
           <p>About Horse3</p>
        </div>     
      </div>
      
      <div class="row">       
          <div class="large-12 columns">
          <div class="panel">
             <h3>Welcome To The Turf Club</h3>
             <p>We conduct most of the national/international horse-races in India.</p>
             <button class="small round button" onclick="location.href='About_Us.html';">Learn More</button>
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
    
  </body>
</html>
