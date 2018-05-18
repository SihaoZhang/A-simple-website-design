<?php
session_start();
$nowid = $_SESSION['sid'];
for ($i = 1; $i <= $_SESSION['size_fol']; $i++) {
 	$index = "company".$i;
 	if(isset($_POST[$index])){
 		$comid = $_SESSION['com'.$i];
 		break;
 	}
 }
 $sql = "DELETE FROM follow WHERE sid = '$nowid' AND cid = '$comid'";
 sqlresult($sql) or die('wrong delete');
 header('refresh:2;url=follow.php');  
 echo "Finish unfollowing!";  
 exit;  
function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915", "jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}

?>
