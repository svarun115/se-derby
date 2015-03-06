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

    $dbhost = 'localhost';
    $dbuser='admin'
    $dbpass = 'admin';
    $db = 'club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
    mysqli_query($conn,"insert into member(ph_no bigint, name, gender, dob,address,member_type) values ($_POST['phno'],$_POST['name'], $_POST['gender'],$_POST['m_dob'], $_POST['addr']+$_POST['city']+$_POST['pin'], $_POST['mem_type'];");
      $mem_id=mysqli_query($conn,"select member_id from member where ph_no=$_POST['phno'];");
      mysqli_query($conn,"insert into auth(member_id,email,password)values($mem_id,$_POST['email'],$_POST['password']");
    

    ?>      
      
      
       
      
    
 
 
 
      <div class="large-4 large-centered columns">
  <div class="large-12 columns">
<h5>Welcome to the club <?php echo $_POST["name"]; ?>!</h5>
      <h5>Your member ID is <?php echo $mem_id;?>. Please remember this for future reference.</h5>  
       <a href="#">Continue</a>
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
