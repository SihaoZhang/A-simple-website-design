<?php
function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	//mysqli_close($con);
	return $result;
}

session_start();
$num = $_SESSION['search3'];
$sid = $_SESSION['sid'];

for($i=1;$i<=$num;$i++){
	if (isset($_POST['invite'.$i])){
		$fid=$_SESSION['fid'.$i];

		if ($fid==$sid){
			header('refresh:2;url=index.php');  
			echo "you cannot send friend request to yourself";
			exit;}
		$query1="insert into invitation values ('$fid', '$sid', now(), 'Holding',1)";
		$result1=sqlresult($query1);
		header('refresh:2;url=index.php');  
		echo "requests sent";
		exit;
	}	
	if (isset($_POST['delete'.$i])){
		$fid=$_SESSION['fid'.$i];
		$query3="delete from message where sid='$sid' and fid='$fid'";
		$result3=sqlresult($query3) or die ("1");
		$query5="delete from message where sid='$fid' and fid='$sid'";
		$result5=sqlresult($query5) or die ("2");
		$query3="delete from friend where sid='$sid' and fid='$fid'";
		$result3=sqlresult($query3) or die ("3");
		$query5="delete from friend where sid='$fid' and fid='$sid'";
		$result5=sqlresult($query5) or die ("4");
		header('refresh:3;url=index.php');  
		echo "deletion finished";
		exit;
	}
}

?>