<?php
session_start();
$nowid = $_SESSION['sid'];

function sqlresult($sql){
	$con = mysqli_connect("localhost","root","","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster Student Home</title>
</head>
<body>

	<h1>Jobster</h1>
	<form action = "Stusearch.php" method = "post">
		<input type = "text" name = "Search" placeholder="Search for you want" />
		<input type = "submit" value="Search" name = "submit"/>
	</form><?php
		echo "Welcome, $nowid";
	?>
    |
    <a href = "Logout.php">Log out</a>
	<br>
	<form action = "Stuhome.php" method = "post">
		<input type = "submit" value="Network" name = "Network">
	</form>
	<form action = "Stuhome.php" method = "post">
		<input type = "submit" value="Company" name ="Company">
	</form>
	<form action = "Stuhome.php" method = "post">
		<input type = "submit" value="Follow" name = "Follow" >
	</form>
	<form action = "Stuhome.php" method = "post">
		<input type = "submit" value="Notification" name = "Notification">
	</form>
	<form action = "Stuhome.php" method = "post">
		<input type = "submit" value="Profile" name = "Profile">
	</form>
	<?php
	if(isset($_POST['Network']) or isset($_POST['SearchCompany']) or isset($_POST['Company']) or isset($_POST['Follow']) or isset($_POST['Notification']) or isset($_POST['Profile'])){
		if(isset($_POST['Network'])){
			$sql = "SELECT s.sname, s.sid, s.university FROM friend AS f, student AS s WHERE f.sid = '$nowid' AND f.fid = s.sid";
			$result = sqlresult($sql);
			$num = mysqli_num_rows($result);
			$_SESSION['size'] = $num;
			for($i = 1;$i <= $num;$i++){
				$row = mysqli_fetch_array($result);	
	?>
		<form action = "Message.php" method = "post">	
			<h3><?php echo $row['sname']?></h3>
			Email: <?php echo $row['sid']; $_SESSION['friend'.$i] = $row['sid'];?><br>
			University: <?php echo $row['university']?><br>
			<tr><input type = "submit" value= "Contact friend" name = "friend<?php echo $i;?>" ></tr>
			<?php 
			$_SESSION['fidm'.$i]=$row['sid'];
			?>
		</form>
	<?php
		}
	}
	?>
	<?php
		if(isset($_POST['SearchCompany'])){
			$searchq = $_POST['Search'];
			$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
			$sql = "SELECT c.cname, c.clocation, c.industry, c.cid FROM company AS c WHERE c.cname like '%$searchq%' or c.clocation like '%$searchq%' or c.industry like '%$searchq%'";
			$result = sqlresult($sql);
			$num = mysqli_num_rows($result);
			$_SESSION['size'] = $num;
	?>
		<br>
		<form action = "Stuhome.php" method = "post">
			<input type = "text" name = "Search" placeholder="Company Search" >
			<input type = "submit" value="SearchCompany" name = "SearchCompany">
		</form><br><br>
	<?php
		for($i = 1;$i <= $num;$i++){
			$row = mysqli_fetch_array($result);	
	?>
		<form action = "Comhome.php" method = "post">	
			<h3><?php echo $row['cname']?></h3>
			Location: <?php echo $row['clocation']?><br>
			Industry: <?php echo $row['industry']?><br>
			<?php $_SESSION['company'.$i] = $row['cid'];?>
			<input type = "submit" value="Company information" name = "company<?php echo $i;?>" ><br><br>
		</form>
	<?php
		}
	}
	?>

	<?php
		if(isset($_POST['Company'])){
			$sql = "SELECT c.cname, c.clocation, c.industry, c.cid FROM company AS c";
			$result = sqlresult($sql);
			$num = mysqli_num_rows($result);
			$_SESSION['size'] = $num;
	?>
		<br>
		<form action = "Stuhome.php" method = "post">
			<input type = "text" name = "Search" placeholder="Company Search" >
			<input type = "submit" value="SearchCompany" name = "SearchCompany">
		</form><br><br>
	<?php
		for($i = 1;$i <= $num;$i++){
			$row = mysqli_fetch_array($result);	
	?>
		<form action = "Company.php" method = "post">	
			<h3><?php echo $row['cname']?></h3>
			Location: <?php echo $row['clocation']?><br>
			Industry: <?php echo $row['industry']?><br>
			<?php $_SESSION['company'.$i] = $row['cid'];?>
			<input type = "submit" value="Company information" name = "company<?php echo $i;?>" ><br><br>
		</form>
	<?php
		}
	}
	?>

	<?php
		if(isset($_POST['Follow'])){
			$sql = "SELECT c.cname, c.clocation, c.industry, c.cid FROM follow AS f, company AS c WHERE f.cid = c.cid AND f.sid = '$nowid'";
			$result = sqlresult($sql);
			$num = mysqli_num_rows($result);
			$_SESSION['size'] = $num;
			for($i = 1;$i <= $num;$i++){
				$row = mysqli_fetch_array($result);	
	?>
		<form action = "Company.php" method = "post">	
			<h3><?php echo $row['cname']?></h3>
			Location: <?php echo $row['clocation']?><br>
			Industry: <?php echo $row['industry']?><br>
			<?php $_SESSION['company'.$i] = $row['cid'];?>
			<input type = "submit" value="Company information" name = "company<?php echo $i;?>"><br><br>
		</form>
	<?php
		}
	}
	?>

	<?php
		if(isset($_POST['Notification'])){
			$sql1 = "SELECT * FROM jobpush AS jp, job AS j, company AS c WHERE jp.sid = '$nowid' and j.jid = jp.jid and j.cid = c.cid";
			$sql2 = "SELECT * FROM share AS s, job AS j, company AS c, student as st WHERE s.sid = '$nowid' and j.jid = s.jid and j.cid = c.cid and s.fid = st.sid";
			$sql3 = "SELECT * FROM invitation AS i, student AS s WHERE i.sid = s.sid AND i.iid = '$nowid' AND i.status = 'Holding'";
			$result1 = sqlresult($sql1);
			$result2 = sqlresult($sql2);
			$result3 = sqlresult($sql3);
			$num1 = mysqli_num_rows($result1);
			$num2 = mysqli_num_rows($result2);
			$num3 = mysqli_num_rows($result3);
			$_SESSION['size1'] = $num1;
			$_SESSION['size2'] = $num2;
			$_SESSION['size3'] = $num3;
	?>
		<h2>Job From Company:</h3>
	<?php
		for($i = 1;$i <= $num1;$i++){
			$row = mysqli_fetch_array($result1);	
	?>
		<form action = "stujob_c.php" method = "post">	
			<h4><?php echo $row['jtitle']?></h4>
			Company: <?php echo $row['cname']?><br>
			Location: <?php echo $row['jlocation']?><br>
			Salary: <?php echo $row['salary']?><br>
			Academic requiremnet: <?php echo $row['req']?><br>
			Description: <?php echo $row['description']?><br>
			Before: <?php echo $row['duedate']?><br>
			<?php $_SESSION['job_c'.$i] = $row['jid'];?>
			<input type = "submit" value="Job information"  name = "job<?php echo $i;?>"><br><br>
		</form> 
	<?php
		}
	?>
		<h2>Job From Friend:</h2>
	<?php
		for($i = 1;$i <= $num2;$i++){
			$row = mysqli_fetch_array($result2);	
	?>
		<form action = "stujob_f.php" method = "post">	
			<h4><?php echo $row['jtitle']?></h4>
			Company: <?php echo $row['cname']?><br>
			Location: <?php echo $row['jlocation']?><br>
			Salary: <?php echo $row['salary']?><br>
			Academic requiremnet: <?php echo $row['req']?><br>
			Description: <?php echo $row['description']?><br>
			Before: <?php echo $row['duedate']?><br>
			Comes from: <?php echo $row['sname']?><br>
			<?php $_SESSION['job_f'.$i] = $row['jid'];?>
			<input type = "submit" value="Job information"  name = "job<?php echo $i;?>"><br><br>
		</form> 
	<?php
		}
	?>
		<h2>Friend Request:</h2>
	<?php
		for($i = 1;$i <= $num3;$i++){
			$row = mysqli_fetch_array($result3);	
	?>
		<form action = "invitation.php" method = "post">	
			<h3><?php echo $row['sname']?></h3>
			Email: <?php echo $row['sid']; $_SESSION['invitation'.$i] = $row['sid'];?><br>
			University: <?php echo $row['university']?><br>
			<input type = "submit" value = "Accept"  name = "invitation<?php echo $i;?>">
			<input type = "submit" value = "Refuse"  name = "invitation<?php echo $i;?>"><br><br>
		</form>  
	<?php
		}
	}
	?>

	<?php
		if(isset($_POST['Profile'])){
			$sql = "SELECT * FROM student AS s WHERE s.sid = '$nowid'";
			$result = sqlresult($sql);
			$num = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
	?>
		<br>
		<form action = "stuhome.php" method = "post">	
			Name: <?php echo $row['sname']?><br>
			Email: <?php echo $row['sid']?><br>
			University: <?php echo $row['university']?><br>
			Major and Degree: <?php echo $row['major']?><br>
			GPA: <?php echo $row['GPA']?><br>
			Information: <?php echo $row['sinfo']?><br>
			<a href = "<?php echo $row['resume']?>">Resume preview</a><br><br>
			<input type = "submit" value= "Edit/Update" name = "Edit"><br>
		</form>
	<?php
		}
	}
	else{
			$sql1 = "SELECT * FROM jobpush AS jp, job AS j, company AS c WHERE jp.sid = '$nowid' AND j.jid = jp.jid AND j.cid = c.cid AND jp.pushtime > date_sub(now(), interval 3 month)";
			$sql2 = "SELECT * FROM share AS s, job AS j, company AS c, student as st WHERE s.sid = '$nowid' AND j.jid = s.jid AND j.cid = c.cid AND s.fid = st.sid AND s.sharetime > date_sub(now(), interval 3 month)";
			$sql3 = "SELECT * FROM invitation AS i, student AS s WHERE i.sid = s.sid AND i.iid = '$nowid' AND i.status = 'Holding'";
			$result1 = sqlresult($sql1);
			$result2 = sqlresult($sql2);
			$result3 = sqlresult($sql3);
			$num1 = mysqli_num_rows($result1);
			$num2 = mysqli_num_rows($result2);
			$num3 = mysqli_num_rows($result3);
			$_SESSION['size1'] = $num1;
			$_SESSION['size2'] = $num2;
			$_SESSION['size3'] = $num3;
	?>
		<h2>Job From Company:</h3>
	<?php
		for($i = 1;$i <= $num1;$i++){
			$row = mysqli_fetch_array($result1);	
	?>
		<form action = "stujob_c.php" method = "post">	
			<h4><?php echo $row['jtitle']?></h4>
			Company: <?php echo $row['cname']?><br>
			Location: <?php echo $row['jlocation']?><br>
			Salary: <?php echo $row['salary']?><br>
			Academic requiremnet: <?php echo $row['req']?><br>
			Description: <?php echo $row['description']?><br>
			Before: <?php echo $row['duedate']?><br>
			<?php $_SESSION['job_c'.$i] = $row['jid'];?>
			<input type = "submit" value="Job information"  name = "job<?php echo $i;?>"><br><br>
		</form> 
	<?php
		}
	?>
		<h2>Job From Friend:</h2>
	<?php
		for($i = 1;$i <= $num2;$i++){
			$row = mysqli_fetch_array($result2);	
	?>
		<form action = "stujob_f.php" method = "post">	
			<h4><?php echo $row['jtitle']?></h4>
			Company: <?php echo $row['cname']?><br>
			Location: <?php echo $row['jlocation']?><br>
			Salary: <?php echo $row['salary']?><br>
			Academic requiremnet: <?php echo $row['req']?><br>
			Description: <?php echo $row['description']?><br>
			Before: <?php echo $row['duedate']?><br>
			Comes from: <?php echo $row['sname']?><br>
			<?php $_SESSION['job_f'.$i] = $row['jid'];?>
			<input type = "submit" value="Job information"  name = "job<?php echo $i;?>"><br><br>
		</form> 
	<?php
		}
	?>
		<h2>Friend Request:</h2>
	<?php
		for($i = 1;$i <= $num3;$i++){
			$row = mysqli_fetch_array($result3);	
	?>
		<form action = "invitation.php" method = "post">	
			<h3><?php echo $row['sname']?></h3>
			Email: <?php echo $row['sid']; $_SESSION['invitation'.$i] = $row['sid'];?><br>
			University: <?php echo $row['university']?><br>
			<input type = "submit" value = "Accept"  name = "invitation<?php echo $i;?>">
			<input type = "submit" value = "Refuse"  name = "invitation<?php echo $i;?>"><br><br>
		</form>  
	<?php
		}
	}
	?>

</body>
</html>