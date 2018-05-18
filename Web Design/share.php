<?php
 session_start();
 $size = sizeof($_POST);
 $j = 1;
 for ($i = 1; $i <= $size; $i++, $j++) {
 	$index = "fids".$j;
 	if(isset($_POST[$index])){
 		$fs_id[$i] = $_SESSION['sharefid'.$i];
 	}
 	else{
 		$i--;
 	}
 }
 $nowid = $_SESSION['sid'];
 $jobid = $_SESSION['sharejob'];

 for($k = 1; $k <= $size; $k++){
 	$presql = "SELECT * FROM share WHERE sid = '$fs_id[$k]' and fid = '$nowid' and jid = '$jobid'";
 	$sql = "INSERT INTO share (sid,fid,jid,sharetime,know) VALUES ('$fs_id[$k]','$nowid','$jobid', NOW(),'1')";
 	$result = sqlresult($presql);
 	$num = mysqli_num_rows($result);
 	if ($num == 0){
 		sqlresult($sql) or die("Something wrong!");
 	}
 	else{
		echo "You have already shared this job to $fs_id[$k]!";
 	}
 }
 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Jobster Student Share</title>
</head>
<body>
	<?php
		header('refresh:5;url = index.php');  
		echo "Successfully share!";
		exit;
	?>
</body>
</html>