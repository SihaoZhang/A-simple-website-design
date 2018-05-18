<?php
function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}

session_start();
$num = $_SESSION['size'];
$sid = $_SESSION['sid'];

for($i=1;$i<=$num;$i++){
if (isset($_POST['friend'.$i])){
$fid=$_SESSION['fidm'.$i];}}

$_SESSION['fidm']=$fid;
$query1="select * from message where sid in (select sid from student where sid='$sid' or sid ='$fid') and fid in (select sid from student where sid='$sid' or sid ='$fid') order by mtime desc";
$query2="select * from message where sid ='$fid' and fid ='$sid' and know=1 order by mtime desc";
$result1=sqlresult($query1) or die ("wrong1");
$n1=mysqli_num_rows($result1);
$result2=sqlresult($query2) or die ("wrong2");

$n2=mysqli_num_rows($result2);

	for ($i=1;$i<=$n2;$i++){
		$row=mysqli_fetch_array($result1);
		echo 'from : '.$row['sid'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp to : '.$row['fid'].'<br>';
		echo 'time : '.$row['mtime'].'<br>';
		echo 'content : '.$row['mcontent'].'<br>';
		echo '<br>';
		$update="UPDATE message SET know = 0 WHERE sid ='$fid' and fid ='$sid' and know = 1";
		$result3=sqlresult($update) or die ("wrong");
		}

echo '<br>';
echo '<form action="messagesend.php" method="POST">';
echo '<input type="text" name="content" />';
echo '<input type="submit" name="send" value="send"/>';

?>