<!doctype html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="/se-derby/css/foundation.css" />
    <script src="/se-derby/js/vendor/modernizr.js"></script>
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
            <li><a href="#" class="button">Home</a></li>
            <li><a href="About_Us.html" class="button">About Us</a></li>
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
               <li><a href="betting_rules.html" >Betting Help</li>
                <li><a href="/se-derby/Forms/Form_betting.php" >Win</li>
                <li><a href="/se-derby/Forms/Form_Race_name.php" >Place</li>
               </ul>
             </li>
            <li><a href="race_history.php" class="button">Archives</a></li>
            <li><a href="image-gallery.source.html" class="button">Photo Gallery</a></li>
            <li><a href="contact_us.html" class="button">Contact us</a></li>
          </ul>
         </div>
      </div>



<?php

//echo "In php";
//session_start();
$race = $_SESSION["race"];
$race_table = $_SESSION["race_table"];
$member_name = $_SESSION["name"];
$horse1 = $_POST["horse_place1"];
$horse2 = $_POST["horse_place2"];
$amount = $_POST["amt"];
$_SESSION["h1"]=$horse1;
$_SESSION["h2"]=$horse2;
$dbhost = 'localhost';
$db1='club';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);

if (!$conn)
 {
	    die("Connection failed: " . mysqli_connect_error());
}
if (!$conn1)
 {
	   die("Connection failed: " . mysqli_connect_error());
}
if($horse1=="notype"||$horse2 == "notype"||$horse1==$horse2)
{
	$_SESSION['error_inplace']=1;
	$_SESSION['error_message']="The horse names are not properly selected.";
	header('Location:/se-derby/Forms/Form_Race_name.php');
}
$sql_getmemid= "SELECT member_id from club.members where name like '".$member_name."';";
$result_mem=mysqli_query($conn1,$sql_getmemid);
$row_mem = mysqli_fetch_assoc($result_mem);
$member_id = $row_mem["member_id"];

$sql_amt="SELECT balance from club.account where member_id=$member_id;";
if(!($result_amt=mysqli_query($conn1,$sql_amt)))
	echo $conn1->error;

$row_amt=mysqli_fetch_assoc($result_amt);
$balance=$row_amt["balance"];
$foo = settype($amount,"float");
//echo "--------------------- amt =".$amount."--------bal=".$balance."<br>";
if($amount>$balance)
{
	$_SESSION['error_inplace']=2;
	$_SESSION['error_message']="Balance in account is insufficient to place this bet.";
	header('Location:/se-derby/Forms/Form_Race_name.php');
}
else
{
	$new_balance = $balance-$amount;
	$sql = "UPDATE club.account SET balance = $new_balance where member_id=$member_id;";
	if(!($result_amt=mysqli_query($conn1,$sql)))//;
		echo $conn1->error;
}
//echo "<br>member id = ".$member_id."<br>";
$sql1 = "SELECT horse_name from $race_table";
if(!( $result1=mysqli_query($conn,$sql1)))
	echo $conn->error;
$count = 0;
$horse_name=array();
while($row=mysqli_fetch_assoc($result1))
    {
	           // echo $row["horse_name"];
   	$horse_name[$count++] = $row["horse_name"];
    }
//foreach($horse_name as $h)
    //echo $h."<br>";
$sum = array();
$odds_fraction=array();
	//$sum['silver']=0;

	//$horse_name=array("silver","sunshine","arrow","majestic","royal");
	//queries
$sql = "CREATE TABLE IF NOT EXISTS place (member_id int(11) NOT NULL,race_name varchar(25) NOT NULL,horse_name_place1 varchar(25) NOT NULL,horse_name_place2 varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id,race_name,horse_name_place1,horse_name_place2),foreign key(horse_name_place1) references horse(horse_name) ,foreign key(horse_name_place2) references horse(horse_name) on update cascade on delete cascade)";
if(!mysqli_query($conn,$sql))
  echo $conn->error;

	/*$sql="CREATE TABLE IF NOT EXISTS odds (horse_name varchar(25) NOT NULL, odd_fraction float default '0',primary key(horse_name) foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade";
	echo "hereeeeee";
	*/
$table_name= $race."_odds_place";
$sql = "CREATE TABLE IF NOT EXISTS $table_name (horse_name varchar(25) NOT NULL,odds varchar(25),odds_fraction float(20),PRIMARY KEY (horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
mysqli_query($conn,$sql);
  //echo "success";
	//echo "UGH!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
foreach ($horse_name as $hname) {
$sql="INSERT into $table_name(horse_name,odds,odds_fraction) values ('$hname','4-5',3.09)";
	mysqli_query($conn,$sql);
 	 //echo "success";
 	//else
 		//echo $conn->error;
}
//echo "<br> Hello ".$member_id."<br>";
//echo "<br> Hello ".$horse1."<br>";
//echo "<br> Hello ".$horse2."<br>";
// Insert the values obtained into the place table.
$sql2 = "INSERT into derby.place(member_id,race_name,horse_name_place1,horse_name_place2,amount) values ('$member_id','$race','$horse1','$horse2','$amount');";
$result2 = mysqli_query($conn,$sql2);
	//echo $conn->error;
// code copied from here

$sql="SELECT sum(amount) AS pool FROM place ";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$pool=$row['pool'];


$sql = "SELECT * FROM derby.place";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  //      echo "member: " . $row["member_id"]. " - horse name 1: " . $row["horse_name_place1"]. " - horse name 2:" . $row["horse_name_place2"]. "-amount:".$row["amount"] ."<br>";
    }
} /*else {
    //echo "0 results";
}*/


//try part 
foreach ($horse_name as $hname) {
	# code...
	$sum[$hname]=0;

}
foreach($horse_name as $hname)
{
	$sql="SELECT amount from derby.place where horse_name_place1='".$hname."'or horse_name_place2='".$hname."'";
	$result1=mysqli_query($conn,$sql);



	//echo 'should enter if';

	if (mysqli_num_rows($result1) > 0) {
	    // output data of each row
	  //  echo "entered if";
	    while($row = mysqli_fetch_assoc($result1)) {
	       // echo "-amount:".$row["amount"] ."<br>";
	        $sum[$hname] +=$row["amount"];
	    }
	} //else {
	    //echo "0 results";
	//}
	//echo "pool:".$pool."<br>";

}
foreach ($horse_name as $hname) {
	# code...
	//echo $hname."=".$sum[$hname]."<br>";
	$odds[$hname]="0-0";
	$odds_fraction[$hname]=0;
}

function gcd($x, $y)
{
          $x = abs($x);
          $y = abs($y);
          if($x + $y == 0)
          {
              return 0;
          }
          else 
          {
            while($x > 0)
                    {
                      $z = $x;
                      $x = $y % $x;
                      $y = $z;
                    }
                    return $z;
          }
}
function float2rat($n, $tolerance = 1.e-6) {
	//echo "n=".$n."<br>";
    $h1=1; $h2=0;
    $k1=0; $k2=1;
    $b = (float)1/$n;
    //echo "bbb===".$b."<br>";
    do {
        $b = 1/$b;
        $a = floor($b);
        $aux = $h1; $h1 = $a*$h1+$h2; $h2 = $aux;
        $aux = $k1; $k1 = $a*$k1+$k2; $k2 = $aux;
        $b = $b-$a;
    } while (abs($n-$h1/$k1) > $n*$tolerance);

    return "$h1-$k1";
}

function toFraction($number){ 
    $numerator = 1; 
    $denominator = 0; 
    for(; $numerator < 1000; $numerator++){ 
        $temp = $numerator / $number; 
        if(ceil($temp) - $temp == 0){ 
            $denominator = $temp; 
            break; 
        } 
    } 
    return ($denominator > 0) ? $numerator . '/' . $denominator : false; 
}  

function decToFraction($float) {
    // 1/2, 1/4, 1/8, 1/16, 1/3 ,2/3, 3/4, 3/8, 5/8, 7/8, 3/16, 5/16, 7/16,
    // 9/16, 11/16, 13/16, 15/16
    $whole = floor ( $float );
    $decimal = $float - $whole;
    $leastCommonDenom = 48; // 16 * 3;
    $denominators = array (2, 3, 4, 8, 16, 24, 48 );
    $roundedDecimal = round ( $decimal * $leastCommonDenom ) / $leastCommonDenom;
    if ($roundedDecimal == 0)
        return $whole;
    if ($roundedDecimal == 1)
        return $whole + 1;
    foreach ( $denominators as $d ) {
        if ($roundedDecimal * $d == floor ( $roundedDecimal * $d )) {
            $denom = $d;
            break;
        }
    }
    return ($whole == 0 ? '' : $whole) . " " . ($roundedDecimal * $denom) . "/" . $denom;
}
//printf("%s\n", float2rat(66.66667)); # 200/3
//printf("%s\n", float2rat(sqrt(2)));  # 1393/985
//printf("%s\n", float2rat(0.43212));  # 748/1731



foreach ($horse_name as $hname) {
	# code...
		if($sum[$hname]==0)
		{
			$odds_fraction[$hname]=0;
		}
		else
		{
			$odds_fraction[$hname]=($pool-$sum[$hname])/$sum[$hname];
			//converting decimal to fraction
			//echo "odds_fraction==".$odds_fraction[$hname]."<br>";
			if($odds_fraction[$hname])
				$odds[$hname]=float2rat($odds_fraction[$hname]);
			else if($odds_fraction[$hname]==0)
				$odds[$hname]="1-1";

			/*$whole=floor($odds[$hname]);
			$frac=$odds[$hname]-$whole;
			if($frac!=0)
			{
			$mult=10;
			$x=floor($odds[$hname]*$mult);
			$gcd=gcd($x,$mult);
			$n1=$x/$gcd;
			$n2=$mult/$gcd;
			//$odds_fraction[$hname]=$n1/$n2;
			$odds_fraction[$hname]=$n1/$n2;;
			$odds[$hname]=$n1."-".$n2;
			}
			else
			$odds[$hname]=$odds[$hname]."- 1";
		}*/
}
}
 //Send calculated odds to Tote table
foreach ($horse_name as $hname) {
	# code...
	//echo "Done:".$hname." :odds is: ".$odds[$hname]."  Odds_fraction:".$odds_fraction[$hname]."<br>";
	$name=$odds_fraction[$hname];
	$sql="UPDATE $table_name SET odds='".$odds[$hname]."', odds_fraction=$odds_fraction[$hname] WHERE horse_name='".$hname ."';";
	mysqli_query($conn,$sql);
 	 //echo "success";
 //	else
 	//	echo $conn->error;
}
/*$sql_getall = "SELECT * FROM $table_name;"
$result_getall = (mysqli_query($conn,$sql_getall));
while($row = mysqli_fetch_assoc($result_getall))
{
	echo json_encode()
}
*/

//summary of the bet- display

echo "<div class='large-4 large-centered columns'>
  <div class='large-12 columns'>";
echo "<h2>Your bet has been placed successfully</h2><br>";
echo "<h3>Bet Summary</h3><br>";
echo "Race:".$_SESSION['race']."<br>";
echo "Horse Names:<br>";
echo "Horse in place 1: $horse1<br>";
echo "Horse in place 2: $horse2<br>";
echo "Amount:".$amount."<br>";
echo "</div></div>";

mysqli_close($conn);
//echo "hello";


?>

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