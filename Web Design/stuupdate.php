<?php
 session_start();
//取文件信息
 if(isset($_FILES["file"])){
 	echo "1";
 	 $arr = $_FILES["file"];
	 if($arr["size"]<10241000)
	{
	 $arr["tmp_name"];
	 $filename = "./tempid/".$arr["name"];
	 echo $filename;
	  if(file_exists($filename))
	  {
	    echo "该文件已存在";
	  }
	  else
	  {
	  move_uploaded_file($arr["tmp_name"],$filename);
	  }
	}
	else
	{
	  echo "Too large";
	}
 }
 $nowid = $_SESSION['sid'];
 // $nowid = "bc1234@nyu.edu";
 $presql = "SELECT * FROM student WHERE sid = '$nowid'";
 $result = sqlresult($presql) or die('Select failed');
 $row = mysqli_fetch_array($result);
 if($_POST['sname'] == ''){
 	$sname = $row['sname'];
 }
 else{
 	$sname = $_POST['sname'];
 }
  if($_POST['sid'] == ''){
 	$sid = $row['sid'];
 }
 else{
 	$sid = $_POST['sid'];
 }
  if($_POST['university'] == ''){
 	$university = $row['university'];
 }
 else{
 	$university = $_POST['university'];
 }
  if($_POST['major'] == ''){
 	$major = $row['major'];
 }
 else{
 	$major = $_POST['major'];
 }
  if($_POST['GPA'] == ''){
 	$GPA = $row['GPA'];
 }
 else{
 	$GPA = $_POST['GPA'];
 }
  if($_POST['sinfo'] == ''){
 	$sinfo = $row['sinfo'];
 }
 else{
 	$sinfo = $_POST['sinfo'];
 }
if(isset($_POST['stuupdate'])){
	 if(isset($_FILES["file"])){
		$sql = "UPDATE student SET  sname = '$sname', university = '$university', major = '$major', GPA = '$GPA', sinfo = '$sinfo', resume = '$filename' WHERE sid = '$nowid'";
		sqlresult($sql) or die('Update failed1');
	}
	else{
		$sql = "UPDATE student SET  sname = '$sname', university = '$university', major = '$major', GPA = '$GPA', sinfo = '$sinfo' WHERE sid = '$nowid'";
		sqlresult($sql) or die('Update failed2');
	}

	header('refresh:3; url = index.php');  
	echo 'Update finished!';
	exit;  
	}

 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
?>