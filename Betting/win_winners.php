<?php
$dbhost = 'localhost';
$db2='derby';
$dbuser = 'admin';
$dbpass = 'admin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db2);

$winner="silver"; //Change to post

$sql="SELECT sum(amount) AS pool FROM win";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$pool=$row['pool'];

$sql="SELECT member_id FROM win WHERE horse_name='$winner'";
$result=mysqli_query($conn,$sql);
if(!$result)
{ echo $conn->error;}
$winner_num=$result->num_rows;
$member_winners=array();
$i=0;
if ($result->num_rows > 0) {
while($row =  $result->fetch_assoc())
	{
      $member_winners[$i]=$row['member_id'];
      $i++;
    }
}


$payoff=array();
$win_amt=$pool/$winner_num;

for($i=0;$i<$winner_num;$i++)
{
	$payoff[$member_winners[$i]]=$win_amt;
}

echo json_encode($payoff);
//Send payoff to android


?>