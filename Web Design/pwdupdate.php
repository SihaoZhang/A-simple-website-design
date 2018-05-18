<?php
 session_start();
 $pwd = $_POST['password'];
 $compwd = $_POST['pwdconfirm'];
if(isset($_POST['stu_pwdupdate'])){
 $nowid = $_SESSION['sid'];

if($pwd=='')  //20
{  
    header('refresh:2;url=stu_pwd.php');  
    echo "please insert password";  
    exit;  
} 
if(strlen($pwd)<6)  //20
{  
    header('refresh:2;url=stu_pwd.php');  
    echo "your password should be longer than 6 characters";  
    exit;  
}
if(strlen($pwd)>20)  //20
{  
    header('refresh:2;url=stu_pwd.php');  
    echo "your password should be shorter than 20 characters";  
    exit;  
}
if($compwd=='')  //20
{  
    header('refresh:2;url=stu_pwd.php');  
    echo "please insert pwdconfirm";  
    exit;  
} 
else 
if($compwd!=$pwd)  //20
{  
    header('refresh:2;url=stu_pwd.php');  
    echo "Confirm password should be same as password";  
    exit;
} 
else{
$hashed_cpwd = md5($pwd);
$query1 = "UPDATE student SET  spwd = '$hashed_cpwd' WHERE sid = '$nowid'";
$insert1= sqlresult($query1) or die ("wrong");
header('refresh:2;url=index.php');
echo "Password update successfully";
exit; 
} 
}

if(isset($_POST['com_pwdupdate'])){
     $comid = $_SESSION['cid'];
if($pwd=='')  //20
{  
    header('refresh:2;url=comhome.php');  
    echo "please insert password";  
    exit;  
} 
if(strlen($pwd)<6)  //20
{  
    header('refresh:2;url=comhome.php');  
    echo "your password should be longer than 6 characters";  
    exit;  
}
if(strlen($pwd)>20)  //20
{  
    header('refresh:2;url=comhome.php');  
    echo "your password should be shorter than 20 characters";  
    exit;  
}
if($compwd=='')  //20
{  
    header('refresh:2;url=comhome.php');  
    echo "please insert pwdconfirm";  
    exit;  
} 
else 
if($compwd!=$pwd)  //20
{  
    header('refresh:2;url=comhome.php');  
    echo "Confirm password should be same as password";  
    exit;  
} 
else{
$hashed_cpwd = md5($pwd);
$query1 = "UPDATE company SET  cpwd = '$hashed_cpwd' WHERE cid = '$comid'";
$insert1= sqlresult($query1) or die ("wrong");
header('refresh:2;url=index.php');
echo "Password update successfully";
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