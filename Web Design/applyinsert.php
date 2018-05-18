<?php
 session_start();
 $nowid = $_SESSION['sid'];
 $jobid = $_SESSION['applyjobid'];
if(isset($_POST['application'])){
	$presql = "SELECT * FROM application AS a WHERE a.sid = '$nowid' AND a.jid = '$jobid'";
	$result = sqlresult($presql);
	$num = mysqli_num_rows($result);
	if($num > 0){
		header('refresh:3;url=index.php');  
		echo 'You have already applied for this job';
		exit; 
	}
	else{
		$sql = "INSERT INTO application VALUES ('$nowid', '$jobid', NOW(), 'Holding')";
		sqlresult($sql) or die("You may miss the due date!");
		header('refresh:3;url=index.php');  
		echo 'Successfully apply for this job and GOOD LUCK!';
		exit;  
	}
}

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>