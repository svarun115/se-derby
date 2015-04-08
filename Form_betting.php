<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Betting & Entertainment</title>
    <link rel="stylesheet" href="css/foundation.css" />
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
	  <form action="form_betHorse.php" method="post">
	  <div class="row">
	<div class="large-4 columns">
     <label> <b>Race:</b></label>
	 <select id="race" name="race_type" onchange="update()">
	<?php require 'testr.php';?>
	</select>
    </div>
      
	<div class="large-4 columns">
     <label> <b>Race type:</b></label>
	 <select id="sel" name="type">
	<?php require 'type.php';?>
	</select>
    </div>
	</div>
	<input type="submit" class="radius button expand" style="width:124px;" value="Select the Horse"/>
   <br/>
   </form>
  </body>
  </html>