<?php
function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	//mysqli_close($con);
	return $result;
}

session_start();
$num = $_SESSION['search2'];
$sid = $_SESSION['sid'];

for($i=1;$i<=$num;$i++){
	if (isset($_POST['follow'.$i])){
		$cid=$_SESSION['2cid'.$i];

		$query1="insert into follow values ('$sid', '$cid')";
		$result1=sqlresult($query1);
		header('refresh:2;url=index.php');  
		echo "requests sent";
		exit;
	}	
	if (isset($_POST['unfollow'.$i])){
		$cid=$_SESSION['2cid'.$i];
		$query3="delete from follow where sid='$sid' and cid='$cid'";
		$result3=sqlresult($query3);
		
		header('refresh:10;url=index.php');  
		echo "deletion finished";
		exit;
	}
}

?>