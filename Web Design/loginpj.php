<?php  
$conn = mysqli_connect('localhost', 'root', 'zhangsihao915', 'jobster') or die ("wrong");
if(isset($_POST['submit']))
{
	$uid = $_POST['userid'];  
    $pwd = $_POST['password']; 
	if($uid=='')  
        {  
            header('refresh:2;url=login.php');  
            echo "please insert your id";  
            exit;  
        }  
	if($pwd=='')  
        {  
            header('refresh:2;url=login.php');  
            echo "please insert your password";  
            exit;  
        }  
	$query1="select * from company where cid='$uid' ";
	$query2="select * from student where sid='$uid' ";
	$result1= mysqli_query($conn, $query1);
	$result2= mysqli_query($conn, $query2);
	$sum=mysqli_num_rows($result1)+mysqli_num_rows($result2);
	if ($sum == 0){
		header('refresh:2;url=login.php');  
		echo "wrong userid";
		exit;
		}
	if (mysqli_num_rows($result1)==1){
		$hashed_pwd = md5($pwd);
		$query3="select * from company where cid='$uid' and cpwd='$hashed_pwd' ";
		//$query3="select * from company where cid='$uid' and cpwd='$pwd' ";
		$result3= mysqli_query($conn, $query3);
		if (mysqli_num_rows($result3)!=1){
			header('refresh:3;url=login.php');  
			echo "wrong password";
		exit;}
		else{
		echo "login successfully";
		header('refresh:1;url=com_index.php');
		session_start();
		$_SESSION['cid'] = $uid;
		exit;
		}
		}
	
	if (mysqli_num_rows($result2)==1){
		$hashed_pwd = md5($pwd);
		$query4="select * from student where sid='$uid' and spwd='$hashed_pwd' ";
		//$query4="select * from student where sid='$uid' and spwd='$pwd' ";
		$result4= mysqli_query($conn, $query4);
		if (mysqli_num_rows($result4)!=1){
			header('refresh:3;url=login.php');  
			echo "wrong password";
		exit;}
		else{
		echo "login successfully";
		header('refresh:1;url=index.php');
		session_start();
		$_SESSION['sid'] = $uid;
		exit;
		}
		}	
}
?>
