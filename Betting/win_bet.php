<?php

$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$sql = "CREATE TABLE IF NOT EXISTS win (member_id int(11) NOT NULL DEFAULT '0',horse_name varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
if(!mysqli_query($conn,$sql))
	echo $conn->error;
$member_id="4"; //Change to POST
$horse_name="silver"; //Change to POST
$amount=123; //Change to POST
//This script needs to be called by the android module everytime a user places the bet

$sql="INSERT into derby.win(member_id,horse_name,amount) values ('$member_id','$horse_name','$amount')";
mysqli_query($conn,$sql);
//Caculate new odds
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
$odds=($pool-$amount)/$amount;
$whole=floor($odds);
$frac=$odds-$whole;
if($frac!=0)
{
$mult=10;
$x=floor($odds*$mult);
$gcd=gcd($x,$mult);
$n1=$x/$gcd;
$n2=$mult/$gcd;
$odds=$n1."-".$n2;
}
else
$odds=$odds."- 1"; //Send calculated odds to Tote table
echo "Done ".$odds;
?>