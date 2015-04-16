<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$conn1=mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
		$race=$_POST['race_type'];
		$type=$_POST['type'];
		session_start();
		$memberId=$_SESSION['id'];
		$_SESSION['race']=$race;
		$_SESSION['type']=$type;
?>
		
		
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Betting & Entertainment</title>
    <link rel="stylesheet" href="foundation.css" />
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
    <script src="js/vendor/modernizr.js"></script>
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
    <ul class="right">
         <li class="has-dropdown not-click">
         <?php echo "<a href='#'>".$name."</a>"; ?>
         <ul class="dropdown">
         <li><a href="#">Sign out</a></li>
    </ul>
        </ul> <!-- till here -->
        
        <!-- Else -->
    <ul class="right">
      <li><a href="Forms/Form_Signup.html">SIGNUP</a></li>
    </ul>
   <ul class="right">
      <li><a href="Forms/Form_Login.html">LOGIN</a></li>
    </ul>
    <!-- till here -->
    
  </section>
</nav>
<br>

    <div class="row">
        <div class="large-12 columns">
          <ul class="round button-group">
            <li><a href="derbyhome.html" class="button">Home</a></li>
            <li><a href="About_Us.html" class="button">About Us</a></li>
            <li class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover1" data-options="is_hover:true">Racing</a>
            <ul id="hover1" class="f-dropdown" data-dropdown-content>
                <li><a href="horse_list.php" >Horses </li>
                <li><a href="jockey_list.php" >Jockeys </li>
                <li><a href="trainer_list.php" >Trainers </li>
                <li><a href="betting_rules.html" >Betting</li>
            </ul>                        
            </li>
            <li  class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover2" data-options="is_hover:true">Betting</a>
               <ul id="hover2" class="f-dropdown" data-dropdown-content>
                <li><a href="Form_betting.php" >Win</li>
                <li><a href="Form_betting.html" >Place</li>
               </ul>
             </li>
            <li><a href="#" class="button">Archives</a></li>
            <li><a href="Photo_gallery.html" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.html" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>          
          
      
	  <div class="row">
      <div class="panel" style="position: relative;">
      <div>
      <h5></b>Betting & Entertainment</b></h5>
      </div> </p>
	  <form action="betting.php" method="post">
      <div class="row">
	<div class="large-4 columns">
     <label> <b>Horse:</b></label>
	 <select id="sel" name="horse_type">
	<?php require 'test.php';?>
	</select>
    </div>
	<div class="row">
    <div class="large-4 columns">
      <label><b>Betting Amount:</b>
        <input type="Number" name="amount" min="10" />
      </label>
    </div>
  </div>

  </div>
   <input type="submit" class="radius button expand" style="width:124px;" value="submit"/>
   <br/>
	<div class="row">
    <div class="large-4 columns">
      <label><b>Horses and details:</b><p>
        <table border="1px">
		<tr>
		<th> Horse-Name</th>
		<th>Jockey</th>
		<th>Trainer</th>
		</tr>
		<?php require 'Bet_table.php';?>
		</table>
      </label>
    </div>
  </div>
 
   </div>
   </form>
  </body>
  </html>