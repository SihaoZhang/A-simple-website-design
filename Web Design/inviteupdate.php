<?php
 session_start();
 $nowid = $_SESSION['sid'];
 for ($i = 1; $i <= $_SESSION['size3']; $i++) {
 	$index = "invitation".$i;
 	if(isset($_POST[$index])){
 		$invid = $_SESSION['invitation'.$i];
 		break;
 	}
 }

 $presql = "UPDATE invitation SET know = '0' WHERE iid = '$invid' AND sid = '$nowid'";
 sqlresult($presql)or die('wrong0');
 if($_POST[$index] == 'Accept'){
 	$sql = "UPDATE invitation as i SET i.status = 'Accept' WHERE i.iid = '$invid' AND i.sid = '$nowid'";
 	$sql1 = "INSERT INTO friend VALUES ('$invid','$nowid')";
 	$sql2 = "INSERT INTO friend VALUES ('$nowid','$invid')";
 	sqlresult($sql) or die('wrong1');
 	sqlresult($sql1)or die('wrong2');
 	sqlresult($sql2)or die('wrong3');
 	header('refresh:5;url=index.php');  
	echo 'Now you are friend!';
	exit;  
 }
 else{
  	$sql = "UPDATE invitation as i SET i.status = 'Refuse'  WHERE i.iid = '$invid' AND i.sid = '$nowid'";
 	sqlresult($sql)or die('wrong4');
 	header('refresh:5;url=index.php');  
	echo 'Refuse!';
	exit;  	
 }

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>