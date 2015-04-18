<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
          
     <div class="row">
     <div class="large-12 columns"> 
     <div class="panel">
    <?php
    include 'welcome_mail.php';
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'club';
    $addr=$_POST['addr']." ".$_POST['city']." ".$_POST['pin'];
    $phno=$_POST['phno'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $dob=$_POST['m_dob'];
    $memtype=$_POST['mem_type'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $hash=password_hash("$pwd", PASSWORD_DEFAULT);
    //$hash="123";
    welcome_send($name,$email,$pwd);
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
    $sql="INSERT INTO club.members (ph_no, name, gender, dob,address,member_type) values ('$phno','$name','$gender','$dob','$addr','$memtype')";
    $sql2="SELECT member_id from club.members where members.ph_no='$phno'";
    
    mysqli_query($conn,$sql);
    $result=mysqli_query($conn,$sql2);
    if ($result->num_rows > 0) {
      while($row =  $result->fetch_assoc())
      $id = $row['member_id'];
   }
   $sql3="INSERT into club.auth values('$id','$email','$hash')";
   mysqli_query($conn,$sql3);

    ?>      
    
    </div>  
    </div>
    </div>
      
      <div class="row">
      <div class="large-4 large-centered columns">

  <div class="large-12 columns">
<h5>Welcome to the club <?php echo $_POST["name"];?>!</h5><br>
      <h5>Your member ID is <?php echo $id;?>. Please remember this for future reference.</h5>  
       <a href="/se-derby/derbyhome.php">Continue</a>
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
          </div>
        </div> 
      </footer>
    
  </body>
</html>
