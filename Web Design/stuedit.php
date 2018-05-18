<?php
session_start();
$nowid = $_SESSION['sid'];

function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915", "jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
$query1="select * from student where sid='$nowid'";
$result1=sqlresult($query1);
$row1=mysqli_fetch_array($result1);
$name=$row1['sname'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
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
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
					<link href="css/owl.carousel.css" rel="stylesheet">
					<script src="js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.php"><span class="fa fa-area-chart"></span>Jobster<span class="dashboard_text">Hi <?php echo $name?></span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="profile.php">
                <i class="fa fa-dashboard"></i> <span>Profile</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Setting</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="stu_pwd.php"><i class="fa fa-angle-right"></i> Password reset</a></li>
                  <li><a href="stu_pri.php"><i class="fa fa-angle-right"></i> Privacy</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="follow.php">
                <i class="fa fa-th"></i> <span>Follow</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="network.php">
                <i class="fa fa-envelope"></i> <span>Network</span>
                </a>
              </li>
              <li class="treeview">
                <a href="stu_not.php">
                <i class="fa fa-envelope"></i> <span>Notification</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="stu_app.php">
                <i class="fa fa-suitcase"></i> <span>Application</span>
                </a>
              </li>
			    <li class="header">Function</li>
              <li><a href="logout.php"><i class="fa fa-angle-right text-red"></i> <span>Log out</span></a></li>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		<?php
		$query2="select * from message where fid='$nowid' and know=1";
		$query3="select * from jobpush where sid='$nowid' and know=1";
		$query4="select * from invitation where sid='$nowid' and status = 'Holding'";
		$query5="select * from share where sid='$nowid' and know=1";
		$result2=sqlresult($query2) or die ("wrong 2");
		$result3=sqlresult($query3) or die ("wrong 3");
		$result4=sqlresult($query4) or die ("wrong 4");
		$result5=sqlresult($query5) or die ("wrong 5");
		$not2=mysqli_num_rows($result2);
		$not3=mysqli_num_rows($result3);
		$not4=mysqli_num_rows($result4);
		$not5=mysqli_num_rows($result5);
		$m=$not2;
		$n=$not3+$not4+$not5;
		?>
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo $m;?></span></a>
							<ul >
							</ul>
						</li>
						<li class="dropdown head-dpdn">
							<a href="stu_not.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $n;?></span></a>
						</li>	
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				<div class="search-box">
				
					<form action=Stusearch.php method="post">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="text" id="input-31" name="Search" />
						<label class="input__label" for="input-31">
						<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						
						</label>


				</div><!--//end-search-box-->
			

				<div class="sub_home">
							<input type="submit" value="Search" name="submit">
						<div class="clearfix"> </div>
					</div>
				</form>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<form action = "stuupdate.php" method="post" enctype="multipart/form-data">
				<h2 class="title1">Profile Update</h2>
				<div class="grids widget-shadow">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								Name: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['sname'];?>" name = "sname">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								Email: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['sid'];?>" name = "sid">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								University: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['university'];?>" name = "university">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								Major: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['major'];?>" name = "major">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								GPA: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['GPA'];?>" name = "GPA">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								Information: <br>
								<input type="text" class="form-control1" placeholder="<?php echo $row1['sinfo'];?>"name = "sinfo">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								Resume Upload: 
								<input type="file" name="file">
							</div>
						</div>
					</div>
					<div class="sub_home">
						<input type="submit" value="Save changes" name="stuupdate">
					</form>	
							<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>Copyright &copy; 2018.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   
</body>
</html>