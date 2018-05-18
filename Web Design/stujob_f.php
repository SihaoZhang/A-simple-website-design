<?php
 session_start();
$nowid = $_SESSION['sid'];
if (isset($_POST['share'])){
	$jobid = $_SESSION['sharejobid'];
}
else{
	 for ($i = 1; $i <= $_SESSION['size2']; $i++) {
 	$index = "job".$i;
 	if(isset($_POST[$index])){
 		$jobid = $_SESSION['job_f'.$i];
 		$sfid = $_SESSION['sfid'.$i];
 		break;
 	}
 	$presql = "UPDATE share SET know = '0' WHERE jid = '$jobid' and fid ='$sfid' and sid = '$nowid'";
	sqlresult($presql) or die ('wrong');
 }
}
$query1="select * from student where sid='$nowid'";
$result1=sqlresult($query1);
$row1=mysqli_fetch_array($result1);
$name=$row1['sname'];
$sql = "SELECT * FROM job AS j, company AS c WHERE j.jid = '$jobid' and j.cid = c.cid";
$result = sqlresult($sql);
$row = mysqli_fetch_array($result);	
 function sqlresult($sql){
	$con = mysqli_connect("localhost","root","zhangsihao915","jobster") or die("Could not connect with the server!");
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	return $result;
}
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
			<div class="main-page general">
				<?php
					if (isset($_POST['share'])){
			    ?>
			    	<h3>Share to:</h3>
				<?php
					$jobid = $_SESSION['sharejobid'];
					$sql1 = "SELECT * FROM friend AS f, student AS s WHERE f.fid = s.sid and f.sid = '$nowid'";
					$result1 = sqlresult($sql1);
					$num1 = mysqli_num_rows($result1);
					$_SESSION['sharejob'] = $jobid;

					for($i = 1;$i <= $num1;$i++){
						$row1 = mysqli_fetch_array($result1);
						$_SESSION['sharefid'.$i] = $row1['fid'];				
				?>
	
						<form action = "share.php" method = "post">
							<table border = "0">
							<tr>
								<td><?php echo $row1['sname'];?></td>
								<td><input type = "checkbox" value = "<?php echo $row1['sname'];?>" name = "fids<?php echo $i;?>"/></td>
							</tr>
						<?php
							}
						?>
							</table>
							<br><input type = "submit" values = "Share">
						</form>
				<?php
			}
			else{
			?>
				<h2 class="title1"><?php echo $row['jtitle'];echo $sfid;echo $jobid;?></h2>
				<div class="panel-info widget-shadow">
					<div class="col-md-6 panel-grids">
						<div class="panel panel-primary"> <div class="panel-heading"> <h3 class="panel-title">Company</h3> </div> <div class="panel-body"><?php echo $row['cname'];?></div> </div>
					</div>
					<div class="col-md-6 panel-grids">
						<div class="panel panel-success"> <div class="panel-heading"> <h3 class="panel-title">Location</h3> </div> <div class="panel-body"><?php echo $row['jlocation'];?></div> </div>
					</div>
					<div class="col-md-6 panel-grids">
						<div class="panel panel-info"> <div class="panel-heading"> <h3 class="panel-title">Academic Request</h3> </div> <div class="panel-body"> <?php echo $row['req'];?></div> </div>
					</div>
					<div class="col-md-6 panel-grids">
						<div class="panel panel-warning"> <div class="panel-heading"> <h3 class="panel-title">Salary</h3> </div> <div class="panel-body"><?php echo $row['salary'];?></div> </div>
					</div>
					<div class="col-md-6 panel-grids">
						<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">Description</h3> </div> <div class="panel-body"><?php echo $row['description'];?></div> </div>
					</div>
					<div class="col-md-6 panel-grids">
						<div class="panel panel-default"> <div class="panel-heading"> <h3 class="panel-title">Due date</h3> </div> <div class="panel-body"><?php echo $row['duedate'];?></div> </div>
					</div>
					<div class="clearfix"> </div>
					<div class="sub_home">
						<?php 
						if($row['duedate'] >= date("Y-m-d")){
							$_SESSION['applyjobid'] = $jobid;
							$_SESSION['sharejobid'] = $jobid;
						?>
						<form action = "applyinsert.php" method="post">
						<input type = "submit" value="Apply Now"  name = "application">
						</form>	
						<form action = "stujob_c.php" method="post">
						<input type = "submit" value="Share to Friends"  name = "share">
						</form>	
						<?php
						} 
						else{
						?>
						<h2>Closed Now!</h2>

						<?php
						}
						?>

						<div class="clearfix"> </div>
				</div>
				</div>
			<div class="clearfix"> </div>
			<?php
		}
		?>
		</div>
				
			</div>
		</div>
	</div>
		
	<!-- new added graphs chart js-->
	
  
	
	
	
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
		
	
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
</body>
</html>