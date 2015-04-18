<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
          
          
      <div class="row">
         <div class="large-12 large-centered columns" >    

        <div class="panel">
        <div class="wrap2">
            <h2>
                TURF CLUB</h2>
            <div class="aboutTC">
                <p>
                    IT all begin here, more than 150 years after Kempe Gowda founded Bangalore. In 1537,Indian
                    racing began to evolve, but not before overcoming two problems that prevented it
                    from establishing itself earlier. The wars that the Mysoreans, the English, the
                    French, the Marathas and the Nawab of Bengal fought between the 1740s and the 1790s
                    together posed one problem, creating situations that were not conducive for pursuits
                    like racing. The non-availability of suitable horses was the other. Brigadier General
                    Sir Ormonde Winter observed in Racing At Home And Abroad that, the native "country-bred''
                    pony was hardy but unsuitable for racing.' It was clear even during those days that
                    Bangalore had an asset that would influence equestrian pursuits in the region. It
                    was the city's climate. M. Fazlul Hasan noted in his Bangalore Through The Centuries
                    that the climate was found to be ideal for breeding cavalry horses. He said that,
                    "<b>Bangalore was particularly well suited for rearing horses from Persia.</b>" The breeding
                    of local horses was encouraged at that time. The Mysore cavalry had rows of stables
                    outside the city's fort in what is now Kalasipalayam while the syces lived in what
                    is now Parvathipuram.</p>
                <p>
                    <b>Birth of Turf Club</b> - One morning in December 1 1920, four stewards
                    met at the grandstand of the Turf Club's present location in High Grounds. They
                    were: Major R.H.O.D Paterson, Sir Leslie Miller, Major J.M Holmes and C.N Suryanarain
                    Row. These gentlemen approved to form a race club in the city.There were to be 30
                    club members. The Stewards could elect an unlimited number of stand members. The
                    admission charges for both types of memberships was Rs 20. Men were required to
                    pay while entry was free for women.</p>
                <p>
                    The rules of the Bangalore Race Club were framed in three months. These rules were
                    read and passed at the
                </p>
                <p>
                    March 13, 1921 Stewards meeting held at the United Services Club. It was also decided
                    that additional races held in July should should be closed to the members of the
                    United Sevices Club, Madras Club, Madras Race Club, Ooty club and Bangalore Turf
                    Club. On May 20, 1921, the TC was inaugurated at a general meeting.
                </p>
                <p>
                    The committee elected under the new club's rules comprised of Col.J. Desaraj Urs,
                    Maj. R.H. O.D Paterson (Poona Horse), Sir Leslie Miller, Lt. Col. C.S. Rome (Queen's
                    Bays), Lt. Col. C. Gaunt and Lt. Col. H. Comes. Other members elected by the stewards
                    were C.N. Suryanarain Row, Aga Abbas Ali and Shirley Tremeane.</p>
                <p>
                    The meeting decided the lands held by the stewards since the 1916 agreement (when
                    an agreement was drawn up with the Maharaja of Mysore enabling the Stewards of the
                    Bangalore races to hold the race course lands!) must now be assigned to the newly
                    elected committee. Accordingly, on September 9, 1923 the lands were granted to the
                    Turf Club by the Maharaja's government.
                </p>
                <p>
                    The agreement read, "The said lands will be held in the sole possession of the Race
                    Club Committee so long as they are utilized for a Race Course. The secretary at
                    that time was H. Donne. Race books dating from 1905 show that he had been serving
                    the sport in Bangalore for at least 15 years before the club was formed.</p>
                <h4>
                    Bringing Up Polo</h4>
                <p>
                    The 1937 TC rule book indicates how the club supported hunting and polo in Bangalore.
                    It specifies that a percentage of the net profits from every gymkhana will be made
                    over to a hunt and polo committee. It also says that the maharaja would have to
                    approve the nomination of the Master of Hounds. The minute book shows that contributions
                    were also made to the Coorg Hounds. The minute book further reveals that the TC
                    regularly contributed to the rail fare of polo ponies brought over to Bangalore
                    for tournaments. It appears that the polo grounds were located in Ulsoor and Domlur
                    areas. Apart from supporting other equestrian activities, TC contributed regularly
                    to various charities.
                </p>
                <h4>
                    TC's Role During War</h4>
                <p>
                    During World War II, the Bangalore Race Club was among the many organisations that
                    raised war funds. The treble event pool of Rs. 2,057 remained unpaid on the last
                    day's races in 1940. The TC committee decided to contribute this amount to the
                    Madras Mail War Plane Fund through the Mysore State War Relief Fund. The committee
                    decided shortly afterwards to contribute the Rs. 1,000 saved by canceling the stewards'
                    luncheon and the race ball to the Mysore Plane Fund. The first day of the seven
                    day 1941 season was organised as a 'War Fund Day'.</p>
                <p>
                    The official race books were available at various establishments in the city Among
                    these were Funnells Ltd. on 'South Parade,' the BUS Club West End Hotel, Krishnaiah
                    Chetty &amp;Co. on Commercial St. and Bowring Institute Riding Down Memory LaneAmong
                    the famous owners mentioned in the race book were the Maharaja Gaekwar of Baroda,
                    the Maharaja of Idar and the Maharaja of Cooch Behar. The names of trainers who
                    were in Bangalore then may evoke nostalgic memories among old timers.</p>
                <p>
                    The names included those of Tom Hill, R. Shamlan, M. Ali Asker II, Mohammed Lahori,
                    R. Khodyar and N.E. Raymond. Despite this impressive line- up, some owners still
                    preferred to have their horses trained privately. The list of jockeys included the
                    names of Baba Khan, W.H. Carr, W.J. Sibbrit, L.W. Marrable, E. Britt, T. Burn, W.T.
                    Evans, A. Roberts, P. Rylands, N. Whiteside and Parsuji Shanker.</p>
                <p>
                    Baba Khan's family produced a host of racing professionals. Carr was the English
                    royal family's jockey who partnered the great Prince Pradeep in India. Sibbrit taught
                    Pandu Khade and M. Jagdish pacework while Marrable taught current ace Aslam Kader
                    race riding. Unearthing a season of significance, the Turf Club's race
                    course was, quite literally, dug up during the military occupation. Telephone and
                    drainage lines were laid across the track. Apart from the track, the stables were
                    also far from being ready for a racing season. The Conditions improved later. By
                    1951 the 'Bloodhorse Breeders' Review had much to praise about racing in the city.
                    It said, "One of the most attractive racing centres in the South, from all points
                    of view, is Bangalore. The climate is pleasant and racing and other amenities are
                    excellent.</p>
                <p>
                    Trainers from Calcutta and Bombay summer their horses here, and young imported thoroughbreds
                    relish the lush pastures and generally make good progress in their preparation."
                    The season saw 362 horses contesting for 91 races which in those days was an achievement
                    of sorts.</p>
                <p>
                    In what the Review called, "the outstanding feature of the season." a horse bred
                    in Pakistan but classified as an Indian-Bred, won 5 races in a row Named Pocket
                    Apollo. He won the Apollo Cup and RWITC Cup while picking up Rs. 19,500 in stake
                    money. Fellexia( Rockfel-Lexia), a four-year old English Filly won the season's
                    main event- the Class 111 Maharaja of Mysore's Gold Cup She took 2 minutes and 35
                    seconds to win a race being run over 1 and half miles for the first time.</p>
                <p>
                    The Bangalore racecourse nestles amidst 85 acres of greenery in the heart of the
                    city. It presents a truly beautiful sight hroughout the year.</p>
                <p>
                    Bangalore boosts not only of the best weather but also the best professionals as
                    well.</p>
                <p>
                    Starting as a Summer racing center, racing has today grown enormously, with about
                    65 days programmed over 2 seasons, Summer and Winter spread over 8 months in Bangalore.
                    This is apart from the 45 days of racing at Mysore, which is conducted by the Mysore
                    Race Club.</p>
                <p>
                    Bangalore Race Track is a challenging one. It is an oval shaped, right-handed course
                    measuring approximately 1950m with 4 sharp curves and pronounced gradients. The
                    downhill backstretch drops 13.10m (43 feet) from 1800m to 800m and climbs 11.58m
                    (38 feet) from the point to the winning post, with a further rise of 1.5m (five
                    feet) from the winning post to the 1800m marker. This demanding and testing race
                    track, with its gradients, bends and a distinct short straight, places a premium
                    both on the speed and the endurance of the horses and the skill and experience of
                    the jockeys. A win on the racetrack is therefore a significant achievement.</p>
                <p>
                    If the Bangalore Race Course is considered as one of the best in the country for
                    the challenge it poses both to the horse and to the riders, the credit should go
                    to the successive administrators who have wisely made use of the natural and undulating
                    contours of the land. The Bangalore Race Course is probably the only one on the
                    world where a limited space of barely 85 acres has been so comprehensively utilised
                    to provide facilities such as stabling for over 1000 horses, three training tracks,
                    an equine swimming pool, training schools, walking rings, a veterinary hospital
                    and even an amateur riding school.</p>
                <p>
                    Turf Club played a crucial role in the starting of off-course betting
                    in association with Royal Western India Turf Club in 1975, which gave a new lease
                    of life to the sport. At that stage, the clubs faced a great financial strain. But
                    with the conduct of off-course betting which is now an all India affair, a degree
                    of financial stability has been ensured so much so that off-course betting is now
                    a lifeline of all Turf Clubs of India.</p>
                <p>
                    Another successful venture of the TC has been the operation of the combined Jackpot
                    Pool along with the other Turf Authorities. Initially, many were skeptical about
                    the success. TC started the joined jackpot pool in association with Madras Racing
                    Undertaking and soon it was an unqualified success. RWITC and RCTC have since joined
                    the pool and one of the biggest attractions for the race-goers has been this combined
                    jackpot. Bangalore has also taken the lead in reducing the gross deductions on win,
                    place and second horse pools in just 2.5 per cent, thereby making the totalizator
                    pools offer more competitive odds than the book markers. The gross deductions on
                    these pools is the lowest in the country.</p>
            </div>
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
