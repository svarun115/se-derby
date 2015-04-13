<?php
//Update accounts with respect to bet. Remaining.
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$conn1=mysqli_connect($dbhost,$dbuser,$dbpass,'club');
$sum = array();
$sql = "CREATE TABLE IF NOT EXISTS win (member_id int(11) NOT NULL DEFAULT '0',horse_name varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id,horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
if(!mysqli_query($conn,$sql))
	echo $conn->error;
session_start();
$member_id=$_SESSION["mem_id"];
$horse_name=$_POST["horse_type"]; 
$amount=$_POST["amount"]; 

//This script needs to be called by the android module everytime a user places the bet
$sql = "CREATE TABLE IF NOT EXISTS win_odds (horse_name varchar(25) NOT NULL,odd varchar(10),PRIMARY KEY (horse_name),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
mysqli_query($conn,$sql);
$validate=True;

$sql3="SELECT balance from account where member_id='$member_id'";
$result=mysqli_query($conn1,$sql3);
		$row = mysqli_fetch_assoc($result)['balance'];
		$row=$row-$amount;
		if($row<0)
		{
			echo "<h2>Account balance low. Cannot place bet.</h2><br>";
			echo "<a href='/se-derby/derbyhome.php'>Back to Home</a>";
			$validate=False;
			//header('Location:/se-derby/derbyhome.php');
		}
if($validate)
{
		$sql4="UPDATE account set balance='$row' where member_id='$member_id'";
		mysqli_query($conn1,$sql4);
//Caculate new odds
$sql="INSERT into derby.win(member_id,horse_name,amount) values ('$member_id','$horse_name','$amount')";
if(!mysqli_query($conn,$sql))
	{
		//echo $conn->error;
		$sql="SELECT amount from derby.win where member_id='$member_id'";
		$r= mysqli_query($conn1,$sql);
		$row = mysqli_fetch_assoc($r)['amount'];
		$row=$row+$amount;
		$sql="UPDATE derby.win set amount='$row' where member_id='$member_id'";
		mysqli_query($conn1,$sql);
	}
$horse_name=array();
$sql = "SELECT * FROM derby.win";
$result = mysqli_query($conn, $sql);
$count=0;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
	$horse_name[$count]=$row["horse_name"];
	$count++;
    }
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
	    while($row = mysqli_fetch_assoc($result1)) {
	        $sum[$hname] +=$row["amount"];
	    }
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
		if($sum[$hname]==0)
		{
			$odds[$hname]=0;
		}
		else
		{
			$odds[$hname]=($pool-$sum[$hname])/$sum[$hname];
			echo $odds[$hname]."<br>";
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
			$odds[$hname]=$n1."-".$n2;
			}
			else if($odds[$hname]<0)
			$odds[$hname]="1-1";
			else
			$odds[$hname]=$odds[$hname]."- 1";
		}

}


foreach ($horse_name as $hname) {
	$name=$odds[$hname];
	$sql="INSERT into derby.win_odds(horse_name,odd) values ('$hname','$name')";
	if(!mysqli_query($conn,$sql)){
		$sql="UPDATE win_odds set odd='$name' where horse_name='$hname'";
	
	mysqli_query($conn,$sql);
}
}
echo "<h2>Your bet has been placed successfully</h2><br>";
echo "<h3>Bet Summary</h3><br>";
echo "Race:".$_SESSION['race']."<br>";
echo "Horse Name:".$_POST["horse_type"]."<br>";
echo "Amount:".$amount."<br>";
}
mysqli_close($conn);

?>
