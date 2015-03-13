<?php
    $dbhost = 'localhost';
    $dbuser = 'admin';
    $dbpass = 'admin';
    $db = 'derby';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    
    $sql="SELECT horse_name from derby.horse";
    $result=mysqli_query($conn,$sql);
    $h_name=array();
    if ($result->num_rows > 0) {
while( $row=  $result->fetch_assoc())
    $h_name[]=$row['horse_name'];
   }
    $sql="SELECT jockey_name from derby.jockey";
    $result=mysqli_query($conn,$sql);
    $j_name=array();
    if ($result->num_rows > 0) {
while( $row=  $result->fetch_assoc())
    $j_name[]=$row['jockey_name'];
   }
    $sql="SELECT trainer_name from derby.trainer";
    $result=mysqli_query($conn,$sql);
    $t_name=array();
    if ($result->num_rows > 0) {
while( $row=  $result->fetch_assoc())
    $t_name[]=$row['trainer_name'];
   }
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
      jockey=document.getElementById("jockey");
      trainer=document.getElementById("trainer");

      
      h_values=<?php echo json_encode($h_name); ?>;
      t_values=<?php echo json_encode($t_name); ?>;
      j_values=<?php echo json_encode($j_name); ?>;
      for(i=0;i<h_values.length;i++)
      {
        selecth=document.createElement("option");
        selectj=document.createElement("option");
        selectt=document.createElement("option");
        selecth.value=h_values[i];
        selecth.innerHTML=h_values[i];
        selectt.value=t_values[i];
        selectt.innerHTML=t_values[i];
        selectj.value=j_values[i];
        selectj.innerHTML=j_values[i];
        horse.appendChild(selecth);
        jockey.appendChild(selectj);
        trainer.appendChild(selectt);

      }
      //select.value="horse2";
      //select.innerHTML="horse2";
      //horse.appendChild(select);
    }
    </script>
  </head>
  <body onload="addData()">
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
      <h5>Current Race Details</h5>
      </div> </p>
      
      <form action="create_races.php" method="POST">
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
      		</select>
			</td>
			
			<td><select id="jockey">
     			<option value="notype" id="no_type">--Select--</option>
      		</select></td>
			<td><select id="trainer">
     			<option value="notype" id="no_type">--Select--</option>
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
      <input type="submit"/>
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
