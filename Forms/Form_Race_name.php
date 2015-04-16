<?php
session_start();
//$_SESSION["error_inplace"]=0;
if(empty($_SESSION['name']))
{
  $_SESSION['error']=1;
header('Location:/se-derby/derbyhome.php');
}
          if(isset($_SESSION["error_inplace"]))
          {
            $error_no=$_SESSION["error_inplace"];
            if($error_no=="1")
            {
              $message = "The horse names are not properly selected.";
              echo "<script type='text/javascript'>alert('$message');</script>";
              $_SESSION["error_inplace"]=0;
            }
            else if ($error_no=="2")
            {
              $message = "Balance in account is insufficient to place this bet.";
              echo "<script type='text/javascript'>alert('$message');</script>";
              $_SESSION["error_inplace"]=0;
            }
            
            
         }

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Betting</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
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
    <ul class="right">
         <li class="has-dropdown not-click">
         <a href="#">Username</a>
         <ul class="dropdown">
         <li><a href="#">Sign out</a></li>
    </ul>
        </ul> <!-- till here -->
        
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
                <li><a href="betting_rules.html" >Betting</li>
            </ul>                        
            </li>
            <li><a href="race.php" class="button">Fixtures</a></li>
            <li><a href="#" class="button">Archives</a></li>
            <li><a href="Photo_gallery.html" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.html" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>          
    <form action = "http://localhost/se-derby/Forms/Form_Inplace_Betting.php" method = "post">
    <div class="row">
     <h4><pre>  Inplace Betting</pre></h4>
     <div class="large-12 columns">
     <div class="panel">
         <div class="row">        
       <div class="large-6 columns">
          <label><h5>Race Name</h5> 
      <select name="race_name" id = "race_name" >
      <option value="notype" id="no_type">--Select--</option>
      <?php
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
          $sql = 'SELECT race_name From racing_history;';
          $result=mysqli_query($conn1,$sql);
          $count=1;
          while($row = mysqli_fetch_assoc($result)) {
          $value= $count;
          $id = "race".$count;
          echo '<option value='.$row["race_name"].' id='.$id.'>'.$row["race_name"].'</option>';
          $count++;
        }
      ?>
      <!--
      <option value="1" id="race1">Race1</option>
      <option value="2" id="race2">Race2</option>
      <option value="3" id="race3">Race3</option>
      <option value="4" id="race4">Race4</option>
      -->
      </select>
  <br>
   <div class="row">
    <div class="large-4 columns">
 <button class="radius button expand" onclick="submit">Submit</button>
 </form>
</div>
</div>
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
