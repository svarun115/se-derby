<!doctype html>
<?php
session_start();
if(empty($_SESSION['name']))
{
	$_SESSION['error']=1;
header('Location:/se-derby/derbyhome.php');
}
?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Betting & Entertainment</title>
    <link rel="stylesheet" href="/se-derby/css/foundation.css" />
	<style>
	table, td, th {
    border: 1px  black;
	}
	
	th
	{
		background-color:grey;
		
	}

	td {
	width:400px;
    height: 50px;
    vertical-align: bottom;
	}
	
	
	</style>
    <script src="/se-derby/js/vendor/modernizr.js"></script>
	<script src="js/CurrentRace.js"></script>

    <script type="text/javascript">

	function update()
	{
		
		sel=document.getElementById("sel");
		//sel.innerHTML='<?php require 'test.php';?>';
	}
	
	
	</script>
  </head>
  <body >
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
    //session_start();
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
    echo "<li><a href='Form_Login.html'>LOGIN</a></li>";
    echo "</ul>";}
    ?>
  </section>
</nav>
<br>

    <div class="row">
        <div class="large-12 columns">
          <ul class="round button-group">
            <li><a href="../derbyhome.php" class="button">Home</a></li>
            <li><a href="../About_Us.php" class="button">About Us</a></li>
            <li class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover1" data-options="is_hover:true">Racing</a>
            <ul id="hover1" class="f-dropdown" data-dropdown-content>
                <li><a href="../horse_list.php" >Horses </li>
                <li><a href="../jockey_list.php" >Jockeys </li>
                <li><a href="../trainer_list.php" >Trainers </li>
                <li><a href="../race.php">Races</a></li>
            </ul>                        
            </li>
            <li  class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover2" data-options="is_hover:true">Betting</a>
               <ul id="hover2" class="f-dropdown" data-dropdown-content>
               <li><a href="../betting_rules.php" >Betting Help</li>
                <li><a href="Form_betting.php" >Win</li>
                <li><a href="Form_Race_name.php" >Place</li>
               </ul>
             </li>
            <li><a href="../race_history.php" class="button">Archives</a></li>
            <li><a href="../image-gallery.source.php" class="button">Photo Gallery</a></li>
            <li><a href="../contact_us.php" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>      
      
                     <script src="../js/vendor/jquery.js"></script> 
<script src="../js/foundation.min.js"></script> 
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
         
          
      
	  <div class="row">
      <div class="panel" style="position: relative;">
      <div>
      <h5></b>Betting & Entertainment</b></h5>
      </div> </p>
	  <form action="/se-derby/tote_table_win.php" method="post">
	  <div class="row">
	<div class="large-4 columns">
     <label> <b>Race:</b></label>
	 <select id="race" name="race_type" name="race_name" onchange="update()">
	<?php require 'testr.php';?>
	</select>
    </div>
	<input type="submit" class="radius button expand" style="width:124px;" value="Select the Horse"/>
   <br/>
   </form>
  </body>
  </html>
