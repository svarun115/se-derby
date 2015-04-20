<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/jquery.js"></script>
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
      
                <script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation({
  orbit: {
    animation: 'slide',
    timer_speed: 1000,
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: true,
    bullets: false
  }
});
</script>
          
          
     <div class="row">
         <div class="large-8 columns">
            <div class="panel">
            
    <div class="content_left">
                                
    <div>
        <div class="wrap2" style="font-weight: bold;">
            <h2>
                Contact Us</h2>
            <h5 style="line-height: 24px;">
                <font style="font-size: 20px;">The Turf Club</font>
                <br>
                P.O. Box. No.8090,<br>
                Race Course Road,<br>
                Bangalore - 560 001</h5>
            <table>
                <tbody><tr>
                    <td>
                        <h4>
                            Phone:</h4>
                        +91 - 80 -  2226 2391-2-3-5 2226 6421
                         2226 0942 / 2226 0662 / 22253969
      
                    </td>
                    <td style="width: 130px;">
                    </td>
                    <td>
                        <h4>
                            Fax:</h4>
                        +91 - 80 - 2225 6995
                        <h4>
                            Email:</h4>
                        contact@ttc.com
                    </td>
                </tr>
            </tbody></table>
           <div style="padding-bottom: 15px;"></div>
            <div class="box_gray">
                <table class="h-n_tbl" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td>
                            Security Office
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 1019
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Purchase Section
                        </td>
                        <td>
                        </td>
                        <td>
                            2228 1763
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Fax on Demand
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 3077(Racing Information)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Recorded Announcement
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 5919 / 2235 5501/2/3(Race Results)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Emergency
                        </td>
                        <td>
                        </td>
                        <td>
                            98452 89632 / 3091 5263(During Bangalore Races)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h4>
                                After Office Hours</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Security Office
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 0942 / 2226 2391
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Veterinary Hospital
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 6421
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Club House
                        </td>
                        <td>
                        </td>
                        <td>
                            2226 4944
                        </td>
                    </tr>
                </tbody></table>
            </div>
        </div>
    </div>

                            </div>
                           
                          
            </div>         
         </div>
         
         <div class="large-4 columns">
             <div class="panel callout radius">
              
             

    <div >
        <span style="color:White;font-size:13px;font-weight:bold;position: relative; top: 36px; right: -165px;">14-03-2015</span>
    </div>
    <div  style="width: 247px; visibility: visible;">
	<div >
		<span style="font-weight: bold;">News Updates</span>
	</div><div >
		<div style="display:none;visibility:hidden;">
			
		</div><div class="ajax__tab_panel" id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4" style="visibility: visible;">
			
                <div class="liveupdates_right" align="left">
                    <div>
				
                        
                                <div>
                                    <b>
                                        <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl00_lbldate">01 Mar 2015</span></b></div>
                                <div>
                                    <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl00_lblnews">Bangalore Winter Races Scheduled for Friday,6th March and Saturday,7th March have been preponed and will now run on Thursday,5th March and Friday, 6th March respectively.</span></div>
                                <div class="dotline">
                                </div>
                            
                                <div>
                                    <b>
                                        <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl01_lbldate">01 Mar 2015</span></b></div>
                                <div>
                                    <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl01_lblnews">Today's Mumbai Races postponed .</span></div>
                                <div class="dotline">
                                </div>
                            
                                <div>
                                    <b>
                                        <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl02_lbldate">28 Jan 2015</span></b></div>
                                <div>
                                    <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl02_lblnews">Former Chairman of Bangalore Turf Club Limited Mr.  V. VENUGOPAL NAIDU passed away in Bangalore. Bangalore Turf Club offers its condolences to the bereaved family</span></div>
                                <div class="dotline">
                                </div>
                            
                                <div>
                                    <b>
                                        <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl03_lbldate">17 Jan 2015</span></b></div>
                                <div>
                                    <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl03_lblnews">SATURDAY 17th JANUARY 2015 Jockey "CHETHAN KALAY S." having ridden 10 winners, he is entitled to claim 3 kgs allowance with effect from today 17th January 2015. He has been granted permission to carry whip with effect from today 17th January 2015.</span></div>
                                <div class="dotline">
                                </div>
                            
                                <div>
                                    <b>
                                        <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl04_lbldate">17 Jan 2015</span></b></div>
                                <div>
                                    <span id="ctl00_LiveUpdatesUserControl1_TabContainer2_TabPanel4_Repeater1_ctl04_lblnews">SATURDAY 17th JANUARY 2015 6th Race The Mysore Race Club Trophy Horse Number 1 "Super Storm" is bay horse 6 years and not as published in the Race Card inadvertently.</span></div>
                                <div class="dotline">
                                </div>
                            
                        
                    
			</div>
                </div>
            
		</div>
	</div>
</div>
    <div>
    </div>

		</div>
	</div>
</div>
    <div>
    </div>
</div>

                                <div class="pad_t15">
                                </div>
                                

    <div class="title_raceupdates">
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
