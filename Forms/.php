<?php
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'admin';
    $db = 'derby';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    
    $sql="SELECT horse_name from derby.horse";
    $result=mysqli_query($conn,$sql);
    $i=0;
    $horse_name=array();
    if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
    $horse_name[$i] = $row;
    $i=$i+1;
   }
   echo $horse_name;

?>
<!doctype html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<script src="js/CurrentRace.js"></script>
    <script type="text/javascript">
    function addData()
    {
      horse=document.getElementById("horse");
      select=document.createElement("option");
      select.value="horse2";
      select.innerHTML="horse2";
      horse.appendChild(select);
    }
    </script>
  </head>
  <body onload="addData()">
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
      <h5>Current Race Details</h5>
      </div> </p>
      
      <form>
        <div class="large-4 columns">
        <label>Time<input type="time" id="time" name="time"/></label>
        <label>Date<input type="date" id="date" name="date"/></label>
      </div>
      <fieldset>
      <table class="large-12 columns" width="600" border="2" id="table">
     <tr id="header">	<th>Horse Name</th>
		<th>Jockey Name</th>
		<th>Trainer Name</th>
		<th>Track Number</th>
		<th> <input type="button" value="Add entry" height="5px" width = "5px" onclick="addRow()" id="addbtn"></th>
	</tr>	

		<tr id="row1">
			<td>
				<select id="horse">
     			<option value="notype" id="no_type">--Select--</option>
      		<option value="horsename" id="cat1">Horse1</option>
      		</select>
			</td>
			
			<td><select id="jockey">
     			<option value="notype" id="no_type">--Select--</option>
      		<option value="horsename" id="cat1">Jockey1</option>
      		</select></td>
			<td><select id="trainer">
     			<option value="notype" id="no_type">--Select--</option>
      		<option value="horsename" id="cat1">Trainer1</option>
      		</select></td>
			<td><select id="track">
     			<option value="notype" id="no_type">--Select--</option>
      		<option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
      		</select></td>
			<td><input type="button" value="Delete entry" onclick="deleteRoww(this)" id="delrow"></td>
				
		</tr>
      </table>
      </fieldset>            
      </form>

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
