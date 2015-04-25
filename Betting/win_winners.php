<?php
/*
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);
$conn1=mysqli_connect($dbhost,$dbuser,$dbpass,'club');*/

$sql="SELECT winner from racing_history where race_id='$race_id'";
$res=mysqli_query($conn1,$sql);
if(!$res)
	echo "Query failed";
else
	echo "Successful<br/>";

$winner=mysqli_fetch_assoc($res)['winner']; //Change to post
echo $winner;

$sql="SELECT odd from win_odds where horse_name='$winner'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$win_odd=$row['odd'];
$win_odd=explode('-',$win_odd);
$odd=((int)$win_odd[0])/((float)$win_odd[1]);
$sql="SELECT member_id,amount FROM win WHERE horse_name='$winner'";
$result=mysqli_query($conn,$sql);
$member_winners=array();
$i=0;
$payoff=array();
if ($result->num_rows > 0) {
while($row = mysqli_fetch_assoc($result))
	{
      $member_winners[$i]=$row['member_id'];
	$payoff[$member_winners[$i]]=$row['amount']*$odd;
      $i++;
    }
}
$j=0;
for($j=0;$j<$i;$j++)
{
$mid=$member_winners[$j];
$amt=(float)$payoff[$member_winners[$j]];
$sql="UPDATE members set Race_update=$amt where member_id='$mid'";
mysqli_query($conn1,$sql);
$sql3="SELECT balance from account where member_id='$mid'";
$result=mysqli_query($conn1,$sql3);
		$row = mysqli_fetch_assoc($result)['balance'];
		$row=$row+$amt;
		$sql4="UPDATE account set balance='$row' where member_id='$mid'";
		mysqli_query($conn1,$sql4);
}
/*
$sql3="SELECT balance from account where member_id='$member_id'";
$result=mysqli_query($conn1,$sql3);
$row = mysqli_fetch_assoc($result)['balance'];
$row=$row-$amount;
$sql4="UPDATE account set balance='$row' where member_id='$member_id'";
mysqli_query($conn1,$sql4);*/
echo json_encode($payoff);
echo json_encode($winner);
//Send payoff to android



?>
