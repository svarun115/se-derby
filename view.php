
<html>
<head>
	<title></title>
</head>
<body>
<?php 
include "race_functions.php";
 
     echo "<div class='large-3 columns' >"; 
      echo "<div class='panel' style='position:relative; height: 577px; width: 235px;'>";
     echo  "<h4>Race Status</h4>";
     echo "<h5><b>Open For Betting:".raceid_to_racename(race_open())."</b></h5>";
     echo "<h5><b>Last finished Race:".last_updated_race()."</b></h5>";
	if(last_updated_race()!="No race")
	{
		echo "<h5><b>Winner:".get_first(last_updated_race())."</b></h5>";
     		echo "<h5><b>Second place:".get_second(last_updated_race())."</b></h5>";
	}
   
?>
</body>
</html>