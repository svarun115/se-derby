
<?php
session_start();
             $race=$_POST["race_name"];
              $_SESSION["race"]=$race;
          
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

      
      
    <form action="/se-derby/Betting/inplace_bet.php" method = "post">
    <div class="row">
     <h4><pre>  Inplace Betting</pre></h4>
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
  
