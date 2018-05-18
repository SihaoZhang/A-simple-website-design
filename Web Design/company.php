<?php
 session_start();
 $nowid = $_SESSION['sid'];
 for ($i = 1; $i <= $_SESSION['size']; $i++) {
 	$index = "company".$i;
 	if(isset($_POST[$index])){
 		$comid = $_SESSION['company'.$i];
 		break;
 	}
 }
$sql = "SELECT * FROM company AS c WHERE c.cid = '$comid'";
$result = sqlresult($sql);
$row = mysqli_fetch_array($result);	

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
	<title>Jobster Student Company</title>
</head>
<body>
	<h1>Jobster</h1>
	<h2><?php echo $row['cname']; ?></h2>
	<form action = "Stusearch.php" method = "post">
		<input type = "text" name = "Search" placeholder="Search for you want" >
		<input type = "submit" value="Search" name = "submit">
	</form><?php
		echo "Welcome, $nowid";
	?>
    |
    <a href = "Logout.php">Log out</a>
	<form action = "followinsert.php" method = "post">	
		<br>Location: <?php echo $row['clocation'];?><br>
		<br>Industry: <?php echo $row['industry'];?><br><br>
    <?php
    	$sql = "SELECT * FROM follow AS f WHERE f.cid = '$comid' AND f.sid = '$nowid'";
		$result = sqlresult($sql);
		$num = mysqli_num_rows($result);
		$_SESSION['followcomid'] = $comid;
		if ($num == 0){
	?>
		<br><input type = "submit" value="+ Follow"  name = "follow"><br><br>
	<?php
		}
		else{
			echo 'Followed';
		}
	?>
	</form> 
	<?php
		$sql1 = "SELECT * FROM job AS j, company AS c WHERE j.cid = '$comid' and j.cid = c.cid";
		$result1 = sqlresult($sql1);
		$row = mysqli_fetch_array($result);	
		$num1 = mysqli_num_rows($result1);
		$_SESSION['size1'] = $num1;
		for($i = 1;$i <= $num1;$i++){
			$row = mysqli_fetch_array($result1);	
	?>
	<form action = "stu_job.php" method = "post">	
		<h4><?php echo $row['jtitle'];?></h4>
		Company: <?php echo $row['cname'];?><br>
		Location: <?php echo $row['jlocation'];?><br>
		Salary: <?php echo $row['salary'];?><br>
		Academic requiremnet: <?php echo $row['req'];?><br>
		Description: <?php echo $row['description'];?><br>
		Before: <?php echo $row['duedate'];?><br>
		<?php $_SESSION['job_c'.$i] = $row['jid'];?>
		<input type = "submit" value="Job information"  name = "job<?php echo $i;?>"><br><br>
	</form>
	<?php
	}
	?>  
</body>
</html>
