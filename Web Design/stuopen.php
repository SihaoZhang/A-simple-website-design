<?php
 session_start();
$nowid = $_SESSION['sid'];

if(isset($_POST['yes'])){
	$sql = "UPDATE student SET  open = '1' WHERE sid = '$nowid'";
	sqlresult($sql) or die('Update failedy');
	header('refresh:2; url = index.php');  
	echo 'Update finished!';
	exit;  
}
else
if(isset($_POST['no'])){
	$sql = "UPDATE student SET  open = '0' WHERE sid = '$nowid'";
	sqlresult($sql) or die('Update failedn');
	header('refresh:2; url = index.php');  
	echo 'Update finished!';
	exit;  
	}
else{
	header('refresh:3; url = index.php');  
	echo 'There is no change.';
	exit;  
}
 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>