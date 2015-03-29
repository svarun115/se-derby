<?php
echo "in second file";
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "sql part";

$winner_first="silver";
$winner_second="sunshine";
$payoff=0;
$profit_first=0;
$profit_second=0;
$sql="select * from place";
$sql1="select * from odds";

$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql1);
echo "<br>";

while($row1=mysqli_fetch_assoc($result2))
			{
					$odds[$row1["horse_name"]]=$row1["odd"];
					echo $row1["horse_name"]."=".$row1["odd"]."<br>";
			}
foreach ($odds as $value) {
	# code...
	echo "value=".$value."<br>";
}
echo "<br><br>";
echo "first:".$winner_first."<br>second:".$winner_second."<br><br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
     {
     	$payoff=0;
		$profit_first=0;
		$profit_second=0;
       echo "member: " . $row["member_id"]. " - horse name 1: " . $row["horse_name_place1"]. " - horse name 2:" . $row["horse_name_place2"]. "-amount:".$row["amount"] ."<br>";
		if($row["horse_name_place1"]==$winner_first)
		{
			
			$profit_first=$odds[$winner_first]*($row["amount"])*0.6;
		}
		if($row["horse_name_place2"]==$winner_second)
		{
			
			$profit_second=$odds[$winner_second]*($row["amount"])*0.4;
		}
		if($profit_first==0 and $profit_second==0)
		{
			$payoff=0;
		}
		else
		{
			$payoff=$row["amount"]+$profit_first+$profit_second;
		}
		echo "member-".$row["member_id"]."profit-".($profit_first+$profit_second)."payoff-".$payoff."<br>";   
    }
} else {
    echo "0 results";
}

?>