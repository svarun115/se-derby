 <?php
    $dbhost = 'localhost';
    $dbuser='admin';
    $dbpass = 'admin';
    $db = 'derby';
	$db1='club';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
	$conn1=mysqli_connect($dbhost, $dbuser, $dbpass,$db1);
		$horse=$_POST['horse_type'];
		$amount=$_POST['amount'];
		$tablename="Win";
		session_start();
		$memberId=$_SESSION['id']; 
		echo $amount;
		$sql2 =  "CREATE TABLE IF NOT EXISTS $tablename (member_id int(11) NOT NULL DEFAULT '0',horse_name varchar(25) NOT NULL,amount float(10),PRIMARY KEY (member_id),foreign key(horse_name) references horse(horse_name) on update cascade on delete cascade)";
		$sql5="INSERT into $tablename values('$memberId','$horse','$amount')";
		$res=mysqli_query($conn,$sql5);
		
		
		$sql2="CREATE TABLE IF NOT EXISTS Account(member_id int(11) NOT NULL DEFAULT '0', Balance int(15), PRIMARY KEY(member_id), foreign key(member_id) references members(member_id))";
		mysqli_query($conn1,$sql2);
		$sql3="SELECT Balance from Account where member_id='$memberId'";
		$result=mysqli_query($conn1,$sql3);
		$row = mysqli_fetch_assoc($result)['Balance'];
		print $row;
		$row=$row-$amount;
		print $row;
		$sql4="UPDATE Account set Balance='$row' where member_id='$memberId'";
		mysqli_query($conn1,$sql4);
		
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
			 
