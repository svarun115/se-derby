<?php
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);

$winner="Eton Blue"; //Change to post

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
while($row =  $result->fetch_assoc())
	{
      $member_winners[$i]=$row['member_id'];
	$payoff[$member_winners[$i]]=$row['amount']*$odd;
      $i++;
    }
}


echo json_encode($payoff);
echo json_encode($winner);
//Send payoff to android


?>
