<?php
 session_start();
 $nowid = $_SESSION['cid'];
$num=$_SESSION['size'] ;
$sid = $_SESSION['app_sid'];
$jid = $_SESSION['app_jid'];
 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}

 	if(isset($_POST['approve'])){
		$query= "update application set status='Accepted' where sid='$sid' and jid='$jid'";
		$result=sqlresult($query) or die("wrong");
		Header("Location:com_app.php");
 		exit;
 	}
	if(isset($_POST['decline'])){
		echo $sid;
		echo $jid;
		$query= "update application set status='Declined' where sid='$sid' and jid='$jid'";
		$result=sqlresult($query) or die("wrong");
		echo "request declined";
		Header("Location:com_app.php") ;
 		exit;
 	}

?>
