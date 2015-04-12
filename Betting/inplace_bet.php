<?php
//echo "In php";
session_start();
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

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
if (!$conn1) {
	   die("Connection failed: " . mysqli_connect_error());
	}
$sql_getmemid= "SELECT member_id from club.members where name like '".$member_name."';";
$result_mem=mysqli_query($conn1,$sql_getmemid);
$row_mem = mysqli_fetch_assoc($result_mem);
$member_id = $row_mem["member_id"];

echo "<br>member id = ".$member_id."<br>";
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
foreach($horse_name as $h)
    echo $h."<br>";
$sum = array();
$odds_fraction=array();
	//$sum['silver']=0;

	//$horse_name=array("silver","sunshine","arrow","majestic","royal");
	//queries
$sql = "CREATE TABLE IF NOT EXISTS place (member_id int(11) NOT NULL,horse_name_place1 varchar(25) NOT NULL,horse_name_place2 varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id),foreign key(horse_name_place1) references horse(horse_name) ,foreign key(horse_name_place2) references horse(horse_name) on update cascade on delete cascade)";
if(!mysqli_query($conn,$sql))
  echo $conn->error;

	/*$sql="CREATE TABLE IF NOT EXISTS odds (horse_name varchar(25) NOT NULL, odd_fraction float default '0',primary key(horse_name) foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade";
	echo "hereeeeee";
	*/
$sql = "CREATE TABLE IF NOT EXISTS odds_place (horse_name varchar(25) NOT NULL,odd float(10),PRIMARY KEY (horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
if(mysqli_query($conn,$sql))
  echo "success";
else
	echo "UGH!!!!!!!!!!!!!!!!!!!!!!!!!!!!";

echo "<br> Hello ".$member_id."<br>";
echo "<br> Hello ".$horse1."<br>";
echo "<br> Hello ".$horse2."<br>";
// Insert the values obtained into the place table.
$sql2 = "INSERT into derby.place(member_id,horse_name_place1,horse_name_place2,amount) values ('$member_id','$horse1','$horse2','$amount');";
if(!($result2 = mysqli_query($conn,$sql2)))
	echo $conn->error;
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
        echo "member: " . $row["member_id"]. " - horse name 1: " . $row["horse_name_place1"]. " - horse name 2:" . $row["horse_name_place2"]. "-amount:".$row["amount"] ."<br>";
    }
} else {
    echo "0 results";
}


//try part 
foreach ($horse_name as $hname) {
	# code...
	$sum[$hname]=0;

}
foreach($horse_name as $hname)
{
	$sql="SELECT amount from derby.place where horse_name_place1='".$hname."'or horse_name_place2='".$hname."'";
	$result1=mysqli_query($conn,$sql);



	echo 'should enter if';

	if (mysqli_num_rows($result1) > 0) {
	    // output data of each row
	    echo "entered if";
	    while($row = mysqli_fetch_assoc($result1)) {
	        echo "-amount:".$row["amount"] ."<br>";
	        $sum[$hname] +=$row["amount"];
	    }
	} else {
	    echo "0 results";
	}
	echo "pool:".$pool."<br>";

}
foreach ($horse_name as $hname) {
	# code...
	echo $hname."=".$sum[$hname]."<br>";
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

$pool=$pool*0.85; //Considering 15% taxes
foreach ($horse_name as $hname) {
	# code...
		if($sum[$hname]==0)
		{
			$odds[$hname]=0;
			$odds_fraction[$hname]=0;
		}
		else
		{
			$odds[$hname]=($pool-$sum[$hname])/$sum[$hname];
			$whole=floor($odds[$hname]);
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
		}
}
 //Send calculated odds to Tote table
foreach ($horse_name as $hname) {
	# code...
	echo "Done:".$hname." :odds is: ".$odds[$hname]."<br>";
	$name=$odds_fraction[$hname];
	$sql="INSERT into derby.odds_place(horse_name,odd) values ('$hname','$name')";
	if(mysqli_query($conn,$sql))
 	 echo "success";
 	else
 		echo"fail";
}

?>