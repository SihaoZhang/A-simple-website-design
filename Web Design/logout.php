<?php
session_start();
session_unset();
session_destroy();
echo "logout successfully！";
header('refresh:3;url=login.php');  
?>