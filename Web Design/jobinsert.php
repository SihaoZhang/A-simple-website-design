<?php
 session_start();
 $nowid = $_SESSION['cid'];
 $jtitle = $_POST['jtitle'];
 $jlocation = $_POST['jlocation'];
 $salary = $_POST['salary'];
 $req = $_POST['req'];
 $description = $_POST['description'];
 $duedate = $_POST['duedate'];


if(isset($_POST['Jobpost'])){
	$presql = "SELECT * FROM job";
	$result = sqlresult($presql);
	$count = mysqli_num_rows($result);
	$count = $count + 1;
	echo $count;
	$sql = "INSERT INTO job(jid, cid, jtitle, jlocation, salary, req, description, postdate, duedate) VALUES ('$count', '$nowid', '$jtitle', '$jlocation', '$salary', '$req', '$description', DATE_FORMAT(NOW(),'%Y-%m-%d'), '$duedate')";
	sqlresult($sql);
	Header("Location:com_jobs.php");
 	exit;
	}

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>