
<?php
session_start();
             //$race=$_POST["race_name"];
             // $_SESSION["race"]=$race;
          
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
         /* $sql = "SELECT race_id FROM racing_history WHERE race_name ='".$race."';";
          $result = mysqli_query($conn1,$sql);
          while($row=mysqli_fetch_assoc($result)) {
            $race_table=$row["race_id"];
           // echo $race_table;
          }*/
          $race=$_SESSION["race"];
         $race_table= $_SESSION["race_table"];
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
          
      
      
    <form action="/se-derby/Betting/inplace_bet.php" method = "post">
    <div class="row">
     <h4><pre> Place a Position Betting</pre></h4>
     <div class="large-12 columns">
     <div class="panel">
       <div class="row">        
       <div class="large-6 columns">
          <label><h5>Horses in Place1</h5> 
      <select name="horse_place1">
      <option value="notype" id="no_type">--Select--</option>
         <?php
          $race=$_POST["race_name"];
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
          $race_table=$_SESSION["race_table"];
        $sql1 = "SELECT horse_name from $race_table";
         if(!( $result1=mysqli_query($conn,$sql1)))
            echo $conn->error;
        $count = 1;
          while($row=mysqli_fetch_assoc($result1))
          {
           // echo $row["horse_name"];
          $id= "horse".$count;
         echo '<option value="'.$row["horse_name"].'" id='.$id.'>'.$row["horse_name"].'</option>';
          //echo "hello";
          $count++;
          }

             
      ?>
 <!--
      <option value="1" id="hr1">Horse1</option>
      <option value="2" id="hr2">Horse2</option>
      <option value="3" id="hr3">Horse3</option>
      <option value="4" id="hr4">Horse4</option>
      -->
      </select>
      </label>  
       </div>
       <div class="large-6 columns">
           <label><h5>Horses in Place2</h5>
      <select name="horse_place2">
      <option value="notype" id="no_type">--Select--</option>
        <?php
          $race=$_POST["race_name"];
          //echo "<h2>".$race."</h2>";
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
          $race_table=$_SESSION["race_table"];
        $sql1 = "SELECT horse_name from $race_table";
         if(!( $result1=mysqli_query($conn,$sql1)))
            echo $conn->error;
        $count = 1;
          while($row=mysqli_fetch_assoc($result1))
          {
           // echo $row["horse_name"];
          $id= "horse".$count;
         echo '<option value="'.$row["horse_name"].'" id='.$id.'>'.$row["horse_name"].'</option>';
          //echo "hello";
          $count++;
          }

             
      ?>
      <!--
      <option value="1" id="hr1">Horse1</option>
      <option value="2" id="hr2">Horse2</option>
      <option value="3" id="hr3">Horse3</option>
      <option value="4" id="hr4">Horse4</option>
      -->
      </select>
      </label>  
       </div>
    </div>
       <div class="row">
      <div class="large-6 columns">
    <label><h5>Bet Amount :</h5>
         <input type="text" name="amt" placeholder="In Rupees"/>
      </label>
    </div>
  </div>
 
 
  <br>
   <div class="row">
    <div class="large-4 columns">
 <button class="radius button expand" onclick="">Submit</button>
</div>
</div>
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
    </div>
    </div>
    </form>
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
  
