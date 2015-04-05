<?php

$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$sum = array();
$odds_fraction=array();

//$horse_name=array("silver","sunshine","arrow","majestic","royal");
$sql = "CREATE TABLE IF NOT EXISTS win (member_id int(11) NOT NULL DEFAULT '0',horse_name varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
if(!mysqli_query($conn,$sql))
	echo $conn->error;
$member_id="3"; //Change to POST
$horse_name="Downey Gap"; //Change to POST
$amount=123; //Change to POST
//This script needs to be called by the android module everytime a user places the bet
$sql = "CREATE TABLE IF NOT EXISTS win_odds (horse_name varchar(25) NOT NULL,odd varchar(10),PRIMARY KEY (horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
mysqli_query($conn,$sql);

$sql="INSERT into derby.win(member_id,horse_name,amount) values ('$member_id','$horse_name','$amount')";
if(!mysqli_query($conn,$sql))
	echo $conn->error;
//Caculate new odds
$horse_name=array();
$sql = "SELECT * FROM derby.win";
$result = mysqli_query($conn, $sql);
$count=0;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "member: " . $row["member_id"]. "horse name : ".$row["horse_name"]."amount:".$row["amount"] ."<br>";
	$horse_name[$count]=$row["horse_name"];
	$count++;
    }
} else {
    echo "0 results";
}
foreach ($horse_name as $hname) {
	# code...
	$sum[$hname]=0;

}
foreach($horse_name as $hname)
{
	$sql="SELECT amount from derby.win where horse_name='".$hname."'";
	$result1=mysqli_query($conn,$sql);

	if (mysqli_num_rows($result1) > 0) {
	    // output data of each row
	  //  echo "entered if";
	    while($row = mysqli_fetch_assoc($result1)) {
	    //    echo "-amount:".$row["amount"] ."<br>";
	        $sum[$hname] +=$row["amount"];
		//echo $sum[$hname];
	    }
	} else {
	    echo "0 results";
	}
}
$sql="SELECT sum(amount) AS pool FROM win";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$pool=$row['pool'];
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
		}
		else
		{
			$odds[$hname]=($pool-$sum[$hname])/$sum[$hname];
			$whole=floor($odds[$hname]);
			$frac=$odds[$hname]-$whole;
			//echo $frac;
			if($frac!=0)
			{
			$mult=10;
			$x=floor($odds[$hname]*$mult);
			$gcd=gcd($x,$mult);
			$n1=$x/$gcd;
			$n2=$mult/$gcd;
			//$odds_fraction[$hname]=$n1/$n2;
			$odds_fraction[$hname]=$n1/$n2;
			$odds[$hname]=$n1."-".$n2;
			}
			else
			$odds[$hname]=$odds[$hname]."- 1";
		}

}


foreach ($horse_name as $hname) {
	# code...
	echo "Done:".$hname." :odds is: ".$odds[$hname]."<br>";
	$name=$odds[$hname];
	$sql="INSERT into derby.win_odds(horse_name,odd) values ('$hname','$name')";
	if(mysqli_query($conn,$sql))
 	 echo "success";
 	else
 		echo"fail";
}


mysqli_close($conn);




?>
