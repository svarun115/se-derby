<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/foundation.css" />
	
    <script src="js/vendor/modernizr.js"></script>
  <style type="text/css">
    #ads {
    width: 465px;
    height: 1200px;
    background-color: #F0F0F0;
    margin-left: 680px;
    position: absolute;
}
#content {
    width: 465px;
    height: 1200px;
    float: left;
    background-color:#F0F0F0;
   margin-left: 185px;
}
</style>
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
    echo "<li><a href='Forms/Form_Login.html'>LOGIN</a></li>";
    echo "</ul>";}
    ?>
  </section>
</nav>
<br>

    <div class="row">
        <div class="large-12 columns">
          <ul class="round button-group">
            <li><a href="derbyhome.php" class="button">Home</a></li>
            <li><a href="About_Us.php" class="button">About Us</a></li>
            <li class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover1" data-options="is_hover:true">Racing</a>
            <ul id="hover1" class="f-dropdown" data-dropdown-content>
                <li><a href="horse_list.php" >Horses </li>
                <li><a href="jockey_list.php" >Jockeys </li>
                <li><a href="trainer_list.php" >Trainers </li>
                <li><a href="race.php">Races</a></li>
            </ul>                        
            </li>
            <li  class="has-dropdown not-click"><a href="#" class="button" data-dropdown="hover2" data-options="is_hover:true">Betting</a>
               <ul id="hover2" class="f-dropdown" data-dropdown-content>
               <li><a href="betting_rules.php" >Betting Help</li>
                <li><a href="Forms/Form_betting.php" >Win</li>
                <li><a href="Forms/Form_Race_name.php" >Place</li>
               </ul>
             </li>
            <li><a href="race_history.php" class="button">Archives</a></li>
            <li><a href="image-gallery.source.php" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.php" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>              
    
               
    <div id="wrapper">
      <div id="content"><h3 style="text-align:center;">Betting Rule 1</h3><hr>
          <p>
            "Totalizator" means any equipment for betting or any other machine or instrument
of Betting of a like nature operated by the club.<br>
"Unit Bet" means in respect of each Bet type the minimum amount fixed by the
Club from time to time. Dividends will be declared on the unit bet for each type of
Betting.<br>
"Backer" means any person who places or purports to place a Bet pursuant to
rules.<br>
"Win" means the type of Betting where the Backer has to select the 1st horse, the
"Winning Combination", in a race.<br>
"Place" means the type of Betting where the Backer has to select at least one of
the placed Horses. The placed Horses from the "Winning Combination", in a race.<br>
"Second Horse" means the type of Betting where the Backer has to select the 2nd
horse, the "Winning Combination", in a race.<br>
"Forecast" means the type of Betting where the Backer has to select the 1st and 2nd
horses in a race in the correct finishing order. The "Winning Combination" is the 1st horse
compled with the 2nd horse in the correct finishing order.<br>
"Quinella" means the type of Betting where the Backer has to select the 1st and
2nd horse in a race regardless of the finishing order of the two horses. The
"Winning Combination" is the 1st horse coupled with the 2nd horse in either order.<br>
"Trinella" means the type of Betting where the Backer has to select the 1st, 2nd and
3rd horse in a race in correct finishing order. The "Winning Combination" is the 1st,2nd
and 3rd placed horses and the "Runner Combination" is the 1st, 3rd and 2nd Placed
horses selected in the correct finishing order.<br>
"Exacta" means the type of Betting where the Backer has to select the 1st, 2nd, 3rd
and 4th horse in a race in correct finishing order. The "Winning Combination" is the
1st,2nd,3rd and 4th placed horses and the "Runner Combination" is the 1st, 2nd in
correct order and other two placed horses in reverse order i.e. 1st,2nd, and 4th & 3rd.<br>
"Treble" means the type of Betting where the Backer has to select the 1st horse
in each of three nominated races. The "Winning Combination" is the selection of
the 1st horse in each of the three nominated races.
          </p>  

      </div>
      <div id="ads"><h3 style="text-align:center;">Betting Rule 2</h3><hr>
          <p><h4>BETTING WITH THE BOOKMAKERS:</h4>

"Mini Jackpot" means the type of Betting where the Backer has to select the 1st
horse in each of four nominated races. The "winning Combination" is the selection
of the 1st horse in each of the four nominated races.<br>
"Jackpot" means the type of Betting where the Backer has to select the 1st horse in each
of five nominated races, The "winning combination" is the selection of the 1st horse in
each of the five nominated races and the "Runner Combination" is the selection of the 1st
horse in each of the first four of the five nominated races.<br>
"Pay out of Winning Tickets" dividends on winning tickets can be collected within
8 days from the date of running of the race on all on-course and off-course days
and on non race days payment to valid tickets will be made on Monday at Gate
No. 3 in BTC Ltd. between 10.30 a.m. to 12.30 p.m.<br>

Betting is permitted only with registered Bookmakers in the area set apart for this
purpose known as the Bookmakers ’Ring’.
No bet will be accepted for less than Rs. 50/- for cash and Rs. 200/- for credit in
the first enclosure and Rs. 20/- for cash and Rs. 100/- for credit in the second
enclosure.<br>
<h4>GENERAL RULES OF BETTING WITH REGISTERED BOOKMAKERS:</h4>
These are prominently displayed in several locations in and around the ’Ring’ (in
both enclosures). Copies at 50 paise each are available with the ’Ring’ Supervisor
in the First Enclosure.<br>
<h4>BETTING TAX:</h4>
As per Government order 20% Betting Tax and 5% Club Commission totalling to
25% is payable by backers on all bets laid or agreed to be laid with licensed
Bookmakers. This is to be collected in advance by Bookmakers.
ON ALL MATTERS UNPROVIDED FOR On all disputes and matters unprovided
for in the rules the decision of the Stewards, B.T.C. shall be final & binding.<br>
<h4>STARTING:
</h4>
A horse is considered to have come under the Starter’s Orders when the field is
finally despatched by the Starter.</p>
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
