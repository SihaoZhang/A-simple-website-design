<?php  
    $conn = mysqli_connect('localhost', 'root', 'zhangsihao915', 'jobster') or die ("wrong");
    if(isset($_POST['signupc']))  
    {  
        $cid = $_POST['cid'];  
        $cname = $_POST['cname']; 
		$cpwd=$_POST['password'];
		$cpwdcon=$_POST['pwdconfirm'];
		
        if($cid=='')  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "please insert your id";  
            exit;  
        }  
		if($cname=='')  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "please insert company name";  
            exit;  
        } 
		if(strlen($cname)>50)  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "your password should be shorter than 50 characters";  
            exit;  
        }
		if($cpwd=='')  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "please insert password";  
            exit;  
        } 
		if(strlen($cpwd)<6)  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "your password should be longer than 6 characters";  
            exit;  
        }
		if(strlen($cpwd)>20)  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "your password should be shorter than 20 characters";  
            exit;  
        }
		if($cpwdcon=='')  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "please insert pwdconfirm";  
            exit;  
        } 
        else 
		if($cpwdcon!=$cpwd)  //20
        {  
            header('refresh:2;url=com_signup.php');  
            echo "pwdconfirm should be same as password";  
            exit;  
        } 
		$hashed_cpwd = md5($cpwd);
		$query1 = "insert into company (cid, cname, cpwd) values ('$cid','$cname','$hashed_cpwd') ";
		//$query1 = "insert into company (cid, cname, cpwd) values ('$cid','$cname','$cpwd')" ;
		$insert1= mysqli_query($conn, $query1) or die ("wrong");
		echo "company account signup successfully";
		header('refresh:2;url=login.php');
	}
	if(isset($_POST['signups']))  
    {  
        $sid = $_POST['sid'];  
        $sname = $_POST['sname']; 
		$spwd=$_POST['password'];
		$spwdcon=$_POST['pwdconfirm'];
		
        if($sid=='')  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "please insert your id";  
            exit;  
        }  
		if($sname=='')  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "please insert your name";  
            exit;  
        } 
		if(strlen($sname)>50)  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "your password should be shorter than 50 characters";  
            exit;  
        }
		if($spwd=='')  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "please insert password";  
            exit;  
        } 
		if(strlen($spwd)<6)  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "your password should be longer than 6 characters";  
            exit;  
        }
		if(strlen($spwd)>20)  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "your password should be shorter than 20 characters";  
            exit;  
        }
		if($spwdcon=='')  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "please insert pwdconfirm";  
            exit;  
        } 
        else 
		if($spwdcon!=$spwd)  //20
        {  
            header('refresh:2;url=stu_signup.php');  
            echo "pwdconfirm should be same as password";  
            exit;  
        } 
		$query4 = "select * from student where sid='$sid'" ;
		$result4= mysqli_query($conn, $query4);
		if (mysqli_num_rows($result4) != 0){
			header('refresh:2;url=stu_signup.php'); 
			echo "sid exists,please use another one";
			exit;
		}
		$hashed_spwd = md5($spwd);
		$query2 = "insert into student (sid, sname, spwd) values ('$sid','$sname','$hashed_spwd')" ;
		//$query2 = "insert into student (sid,sname,spwd) values ('$sid','$sname','$spwd')" ;
		$insert2= mysqli_query($conn, $query2) or die ("wrong");
		echo "student account signup successfully";
		header('refresh:2;url=login.php');
	}
  
?> 