<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
   <div class="row">
        <div class="large-12 columns">
          <ul class="button-group">
            <li><a href="#" class="button">Link 1</a></li>
            <li><a href="#" class="button">Link 2</a></li>
            <li><a href="#" class="button">Link 3</a></li>
            <li><a href="#" class="button">Link 4</a></li>
            <li><a href="#" class="button">Link 5</a></li>
            <li><a href="#" class="button">Link 6</a></li>
            <li><a href="#" class="button">Link 7</a></li>
          </ul>
          
        </div>
      </div>
      
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
   // $hash=password_hash("$password", PASSWORD_DEFAULT);
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
   $sql3="INSERT into club.auth values('$id','$email','$pwd')";
   mysqli_query($conn,$sql3);

    ?>      
      
      
      <div class="large-4 large-centered columns">
  <div class="large-12 columns">
<h5>Welcome to the club <?php echo $_POST["name"];?>!</h5>
      <h5>Your member ID is <?php echo $id;?>. Please remember this for future reference.</h5>  
       <a href="/se-derby/home.html">Continue</a>
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
