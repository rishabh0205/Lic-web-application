<?php include_once 'database/db.php'; include_once 'action.php'; ?>
<?php 
// if(empty($_SESSION["email"]) || empty($_SESSION["name"])) {

// 	header("location:login.php");
// }
?>
<?php
// $admin = "SELECT * FROM adminlogin WHERE email = '$_SESSION[email]'";
// $ra = $conn->query($admin);
// $ras_admin = $ra->fetch_assoc();

	$month = date('m');
	$date = date('d');
?>

<!DOCTYPE html>
<html lang="en">
<head>	
	<title> <?php if($title != '') { echo $title;} else {'LIC Policy Management System..!';} ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link rel="shortcut icon" href="../images/logo.ico" type="images/x-icon">
	<!--external css-->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

	<!-- Custom styles for this template -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="assets/js/chart-master/Chart.js"></script>
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>


<!-- DataTable Links -->
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<!-- DataTable -->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- DataTable Links End -->
</head>

<body>
	<!-- start: Header -->
	<section id="container" >
		<!--header start-->
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right"></div>
			</div>
			<!--logo start-->
			<a href="./" class="logo"><b> <?php //echo $_SESSION['name']; ?> </b></a>
			<!--logo end-->
			<div class="top-menu">
				<ul class="nav pull-right top-menu">
					<li>
						<?php
							$num = 0;
							$cli = $crud->selectRecord('client_policy');
							foreach($cli as $cli_data) {
								$data = explode('-', $cli_data['client_dob']);
								if(($data[1] == $month) && ($data[2] == $date)) {
									$num++;
								}
							}
						?>
						<a class="logout" href="profile.php" style="margin-top:8px;"><img src="assets/images/msgLogo.png"><?php echo $num; ?>
						</a>
					</li>
					<li><a class="logout" href="profile.php"> Profile </a></li>
					<li><a class="logout" href="change_password.php">Change Password</a></li>
					<li><a class="logout" href="logout.php">Logout</a></li>            	
				</ul>
			</div>
		</header>
		<!--header end-->
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu" id="nav-accordion">

					<p class="centered"><a href="profile.php"><img src="assets/images/dietLogo.png" class="img-circle" width="60"></a></p>
					<h5 class="centered"> <?php //echo $_SESSION['short_name']; ?> </h5>

					<li class="sub-menu <?php if($page == 'index') { echo 'active'; } ?>">
						<a href="./">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>

					<!-- <li class="sub-menu <?php //if($page == 'staff') { //echo 'active'; } ?>">
						<a href="policyPlanView.php">
							<i class="fa fa-tasks"></i>
							<span> Policy Plan </span>
						</a>
					</li> -->

					<li class="sub-menu <?php if($page == 'policy') { echo 'active'; } ?>">
                      	<a href="javascript:;" class="<?php if($page == 'policy') { echo 'active'; } ?>">
                          	<i class="fa fa-tasks"></i>
                          	<span> Policy </span>
                      	</a>
                      	<ul class="sub">
                          	<li><a  href="policyPlanView.php"> Policy Plan </a></li>
                      	</ul>
                  	</li>

                  	<li class="sub-menu <?php if($page == 'enquiry') { echo 'active'; } ?>">
                      	<a href="javascript:;" class="<?php if($page == 'enquiry') { echo 'active'; } ?>" >
                          	<i class="fa fa-question-circle"></i>
                          	<span> Enquiry </span>
                      	</a>
                      	<ul class="sub">
                          	<li><a  href="EnquiryView.php"> Customer Enquiry </a></li>
                      	</ul>
                  	</li>

                  	<li class="sub-menu <?php if($page == 'client') { echo 'active'; } ?>">
                      	<a href="javascript:;" class="<?php if($page == 'client') { echo 'active'; } ?>">
                          	<i class="fa fa-user-circle-o"></i>
                          	<span> Client </span>
                      	</a>
                      	<ul class="sub">
                          	<li><a  href="clientPolicyView.php"> Client Policy </a></li>
                      	</ul>
                  	</li>

                  	<li class="sub-menu <?php if($page == 'report') { echo 'active'; } ?>">
                      	<a href="javascript:;" class="<?php if($page == 'report') { echo 'active'; } ?>">
                          	<i class="fa fa-bars"></i>
                          	<span> Report </span>
                      	</a>
                      	<ul class="sub">
                          	<li><a  href="dateWisePolicy.php"> Date-wise Policy </a></li>
                          	<li><a  href="policyWiseClient.php"> Policy-wise Client </a></li>
                      	</ul>
                  	</li>

					<li class="sub-menu">
						<a href="logout.php">
							<i class="fa fa-power-off"></i>
							<span>Logout</span>
						</a>
					</li>

                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li> -->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      