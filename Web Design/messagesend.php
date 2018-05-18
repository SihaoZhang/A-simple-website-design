<?php
function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
if(isset($_POST['send'])){
	session_start();
	$sid = $_SESSION['sid'];
	$fid=$_SESSION['fidm'];
	$mcont=$_POST['content'];
	$query1="insert into message values ('$sid', '$fid', '$mcont', now(), 1)";
	$result1=sqlresult($query1);

$query2="select * from message where sid in (select sid from student where sid='$sid' or sid ='$fid') and fid in (select sid from student where sid='$sid' or sid ='$fid') order by mtime desc";
$result2=sqlresult($query2);
$n=mysqli_num_rows($result2);
if (isset($_POST['show_all'])){
	while($row=mysqli_fetch_array($result2)){ 
				echo 'from : '.$row['sid'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp to : '.$row['fid'].'<br>';
				echo 'time : '.$row['mtime'].'<br>';
				echo 'content : '.$row['mcontent'].'<br>';
				echo '<br>';
			}
}
else{
	for ($i=1;$i<=5;$i++){
		$row=mysqli_fetch_array($result2);
		echo 'from : '.$row['sid'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp to : '.$row['fid'].'<br>';
		echo 'time : '.$row['mtime'].'<br>';
		echo 'content : '.$row['mcontent'].'<br>';
		echo '<br>';
		}
}
echo '<br>';
echo '<form action="messagesend.php" method="POST">';
echo '<input type="submit" name="show_all" value="show_all"/>';
echo '</form >';
echo '<form action="messagesend.php" method="POST">';
echo '<input type="text" name="content" />';
echo '<input type="submit" name="send" value="send"/>';
}
?>