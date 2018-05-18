<?php
 session_start();
 $nowid = $_SESSION['cid'];
if(isset($_POST['pushsatisfied'])) {
	$jobid = $_SESSION['pushjob'];
	$university = $_POST['University'];
	$major = $_POST['Major'];
	$degree = $_POST['Degree'];
	$gpa = $_POST['GPA'];
	$skill1 = $_POST['Skill1'];
	$skill2 = $_POST['Skill2'];
	$sql = "SELECT s.sid, s.sname FROM student AS s WHERE s.major LIKE '%$major%' and s.major LIKE '%$degree%' and s.university LIKE '%$university%' and s.gpa >= '$gpa' and s.sinfo LIKE '%$skill1%' and s.sinfo LIKE '%$skill2%'";
	$result = sqlresult($sql) or die('Something select wrong1!');
	$num = mysqli_num_rows($result);  
}
else{
	for ($i = 1; $i <= $_SESSION['size']; $i++) {
	 	$index = "job".$i;
	 	if(isset($_POST[$index])){
	 		$jobid = $_SESSION['job'.$i];
	 		break;
	 	}
	}
	$sql = "SELECT * FROM follow AS f, student as s WHERE s.sid = f.sid AND f.cid = '$nowid'";
	$result = sqlresult($sql);
	$num = mysqli_num_rows($result);	
}
for($i = 1;$i <= $num;$i++){
	$row = mysqli_fetch_array($result);
	$sid = $row['sid'];
	$sname = $row['sname'];
	$presql = "SELECT * FROM jobpush WHERE sid = '$sid' and jid = '$jobid'";
	$preresult = sqlresult($presql);
	$prenum = mysqli_num_rows($preresult);
	$sql = "INSERT INTO jobpush VALUES ('$jobid', '$sid', NOW() , '1')";
	if($prenum == 0){
		sqlresult($sql) or die('Something insert wrong2!');
?>
	<br>
<?php
		echo 'Push to ';
		echo $sname;
	}
}
 header('refresh:3;url=com_jobs.php');  
 echo 'Successfully Push!';
 exit; 
 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>