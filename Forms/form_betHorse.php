<?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$conn1=mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
		$race=$_POST['race_type'];
		session_start();
		$memberId=$_SESSION['id'];
		$_SESSION['race']=$race;
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
     <div class="row">
        <div class="large-12 columns">
          <ul class="round button-group">
            <li><a href="#" class="button">Home</a></li>
            <li><a href="#" class="button">About Us</a></li>
            <li><a href="#" class="button">Racing</a></li>
            <li><a href="#" class="button">Fixtures</a></li>
            <li><a href="#" class="button">Archives</a></li>
            <li><a href="#" class="button">Photo Gallery</a></li>
            <li><a href="#" class="button">Contact Us</a></li>
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
