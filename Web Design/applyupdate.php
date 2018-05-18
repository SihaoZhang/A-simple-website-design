<?php
 session_start();
 $nowid = $_SESSION['cid'];
$num=$_SESSION['size'] ;

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}


for ($i = 1; $i <= $_SESSION['size']; $i++){
	$index1 = "approve".$i;
	$index2 = "decline".$i;
 	if(isset($_POST[$index1])){
 		$sid = $_SESSION['sid'.$i];
		$jid = $_SESSION['jid'.$i];
		$query= "update application set status='Accepted' where sid='$sid' and jid='$jid'";
		$result=sqlresult($query) or die("wrong");
		Header("Location:com_apply.php")  ;
 		exit;
 	}
	if(isset($_POST[$index2])){
 		$sid = $_SESSION['sid'.$i];
		$jid = $_SESSION['jid'.$i];
		echo $sid;
		echo $jid;
		$query= "update application set status='Declined' where sid='$sid' and jid='$jid'";
		$result=sqlresult($query) or die("wrong");
		echo "request declined";
		Header("Location:com_apply.php") ;
 		exit;
 	}
}

?>
