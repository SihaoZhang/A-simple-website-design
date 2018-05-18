<?php
 session_start();
 $nowid = $_SESSION['cid'];
 $presql = "SELECT * FROM company WHERE cid = '$nowid'";
 $result = sqlresult($presql) or die('Select failed');
 $row = mysqli_fetch_array($result);
 if($_POST['cname'] == ''){
 	$cname = $row['cname'];
 }
 else{
 	$cname = $_POST['cname'];
 }
  if($_POST['clocation'] == ''){
 	$clocation = $row['clocation'];
 }
 else{
 	$clocation = $_POST['clocation'];
 }
  if($_POST['industry'] == ''){
 	$industry = $row['industry'];
 }
 else{
 	$industry = $_POST['industry'];
 }
if(isset($_POST['comupdate'])){
	$sql = "UPDATE company SET  cname = '$cname', clocation = '$clocation', industry = '$industry' WHERE cid = '$nowid'";
	sqlresult($sql) or die('Update failed1');
	Header("Location:com_profile.php");
	exit;

	}

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>