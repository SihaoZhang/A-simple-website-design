<!DOCTYPE HTML>
<html>
<head>
<title>SignUp Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu1-push">
		<div id="page-wrapper">
			

		
		<!--//student -->
			<div class="main-page signup-page">
				<h2 class="title1">Student SignUp Here</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Login Information :</h5>
				<form action="signup.php" method="post">
					<div class="sign-u">
								userid:
								<br>
								<input type="text" name="sid" placeholder="use your email as your userid"/> 
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								user name ( at most 50 characters ):
								<br>
								<input type="text" name="sname" placeholder="your name"/> 
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								password ( 6 - 20 characters ):
								<br>
								<input type="password" name="password" placeholder="password, 6-20 characters"/> 
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name="pwdconfirm" placeholder="confirm password"/> 
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" value="Submit" name="signups">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
						<a class="" href="login.php">
							Login
						</a>
					</div>
					<div class="registration">
						Company Account signup.
						<a class="" href="com_signup.php">
							here
						</a>
					</div>
				</form>
				</div>
			</div>
			<!--//student -->
		</div>
	</div>
	

	
</body>
</html>