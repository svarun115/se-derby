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
    <script type="text/javascript">
    var count=2;
    function init()
    {
      addData("horse","jockey","trainer");
    }
    function addData(horse_id,jockey_id,trainer_id,track_id)
    {

      horse=document.getElementById(horse_id);
      jockey=document.getElementById(jockey_id);
      trainer=document.getElementById(trainer_id);

      
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
      trk=document.getElementById(track_id);
      for(i=1;i<9;i++)
      {
        select=document.createElement("option");
        select.innerHTML=i;
        trk.appendChild(select);
      }
    }

      function addRow () {
     // alert("in add function");
      tab = document.getElementsByTagName("table")[0];

      refrow = document.createElement("tr");

      tk=document.getElementById("track");

      hnew=document.createElement("select");
      jnew=document.createElement("select");
      tnew=document.createElement("select")
      tknew=document.createElement("select");

      hnew.id="horse"+count;
      hnew.name ="horse"+count;
      tnew.id="trainer"+count;
      tnew.name="trainer"+count;
      jnew.id = "jockey"+count;
      jnew.name="jockey"+count;
      tknew.id = "track"+count;
      tknew.name="track"+count;
      //alert(hnew.id);
    //  hnew.setAttribute('name','horse2');
      rnew = document.createElement("tr");
      td1=document.createElement("td");
      td2=document.createElement("td");
      td3=document.createElement("td");
      td4=document.createElement("td");
      td5=document.createElement("td");
      rnew.appendChild(td1);
      rnew.appendChild(td2);
      rnew.appendChild(td3);
      rnew.appendChild(td4);
      rnew.appendChild(td5);
      td1.appendChild(hnew);
      td2.appendChild(jnew);
      td3.appendChild(tnew);
      td4.appendChild(tknew);
      

      rnew.id = "row" + count;

      count++;
      btn=document.createElement("input");
      btn.type="button";
      btn.value="Add Row";
      btn.id="delrow"+count;
      btn.addEventListener("click",deleteRow,false);
      td5.appendChild(btn);
      tab.appendChild(rnew)//document.body.appendChild()
      addData(hnew.id,jnew.id,tnew.id,tknew.id);
    }

    function deleteRow () {
      alert(this.id);
      ielement = document.getElementsByTagName('input');
    }
      //select.value="horse2";
      //select.innerHTML="horse2";
      //horse.appendChild(select);
    
    </script>
  </head>
  <body onload="init()">
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
      <fieldset>
      <table class="large-12 columns" width="600" border="2" id="table">
     <tr id="header">	<th>Horse Name</th>
		<th>Jockey Name</th>
		<th>Trainer Name</th>
		<th>Track Number</th>
		<th> <input type="button" value="Add entry" height="5px" width = "5px" onclick="addRow()" id="addbtn"></th>
	</tr>	

		<tr id="row1" name="row1">
			<td>
				<select id="horse" name="horse">
     			<option value="notype" id="no_type">--Select--</option>
      		</select>
			</td>
			
			<td><select id="jockey" name="jockey">
      		</select></td>
			<td><select id="trainer" name="trainer">
      		</select></td>
			<td><select id="track" name="track">
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
