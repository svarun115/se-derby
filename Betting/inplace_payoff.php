<?php
//echo "in second file";
//session_start();
/*
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$db1='club';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$conn1 = mysqli_connect($dbhost,$dbuser,$dbpass,$db1);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}
*/
//echo "sql part";
//$race = $_SESSION["race"];
//echo "$first $second";
$table_name= $race."_odds_place";
//echo "$table_name<br>";
$sql="SELECT winner, second_place from racing_history where race_id='$race_id'";
$res=mysqli_query($conn1,$sql);
/*if(!$res)
	echo "Query failed";
else
	echo "Successful<br/>";
*/
$names=mysqli_fetch_assoc($res); //Change to post
$first = $names['winner'];
$second = $names['second_place'];

$payoff=0;
$profit_first=0;
$profit_second=0;
$sql="SELECT * from place WHERE race_name = '".$race."';";
$sql1="SELECT * from $table_name";
$odds=array();
$result=mysqli_query($conn,$sql);
if(!$result)
	echo $conn->error;
$result2=mysqli_query($conn,$sql1);
//echo "<br>";

while($row1=mysqli_fetch_assoc($result2))
			{
					$odds[$row1["horse_name"]]=$row1["odds_fraction"];
					//echo $row1["horse_name"]."=".$row1["odds_fraction"]."<br>";
			}
/*foreach ($odds as $value) {
	# code...
	echo "value=".$value."<br>";
}*/
//echo "<br><br>";
//echo "first:".$first."<br>second:".$second."<br><br>";
$profit_payoff=array();
$sql_memid = "SELECT member_id from place";
$res_memid = mysqli_query($conn,$sql_memid);
while($row1 = mysqli_fetch_assoc($res_memid))
{
	$profit_payoff[$row1['member_id']]=0;
}
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
     {

     	$payoff=0;
		$profit_first=0;
		$profit_second=0;
       //echo "member: " . $row["member_id"]. " - horse name 1: " . $row["horse_name_place1"]. " - horse name 2:" . $row["horse_name_place2"]. "-amount:".$row["amount"] ."<br>";
		if($row["horse_name_place1"]==$first)
		{
			
			$profit_first=$odds[$row["horse_name_place1"]]*($row["amount"])*0.6;
		}
		if($row["horse_name_place2"]==$second)
		{
			
			$profit_second=$odds[$row["horse_name_place2"]]*($row["amount"])*0.4;
		}
		if($profit_first==0 and $profit_second==0)
		{
			$payoff=0;
		}
		else
		{
			$payoff=$row["amount"]+$profit_first+$profit_second;
		}
		$profit_payoff[$row['member_id']]+=$payoff;
		//echo "member-".$row["member_id"]." profit-".($profit_first+$profit_second)." payoff-".$payoff."<br>"; 
		if($payoff>0){
			$member_id= $row["member_id"];
		$sql3 = "UPDATE club.account SET balance = balance+$payoff where member_id=$member_id;" ;
		$result3 = mysqli_query($conn1,$sql3);
		$sql4 = "UPDATE club.members SET Race_update=$payoff where member_id=$member_id;";
		$result4 = mysqli_query($conn1,$sql4);
		if(!$result3)
			echo $conn1->error;
		}
    }
} else {
    echo "0 results";
}
echo json_encode($profit_payoff);
echo json_encode($first);
echo json_encode($second);
?>