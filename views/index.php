<?php 
	include '../controllers/server.php';
	include '../controllers/sessionController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="3">
	<title>Dashboard</title>
	 <script src="../assets/js/jquery.ui.min.js"></script>
    	
	<script  src="../assets/js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
   
   <script  src="../assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
	<title>INQUISITIVE</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
	
</head>
<body>
	<div class="nav_bar" id="open_bar" onclick="open_bar()">
		<i class="icon-bars"></i>
</div>
	<div class="nav_bar" id="close_bar" style="display: none;" onclick="close_bar()">
		<i class="icon-times"></i>
	</div>
	<div class="side_nav">
		<div class="student_img">
			<img src="school_images/slide1.jpg">
		</div>
		<ul id="navigations">
			<li><a href=""><b><i class="icon-home"></i></b>Dashboard</a></li>
			<li><a href=""><b><i class="icon-person"></i></b>Profile</a></li>
			<li><a href=""><b><i class="icon-school"></i></b>Performance</a></li>
			<li><a href=""><b><i class="icon-message"></i></b>Communication</a></li>
			<li><a href=""><b><i class="icon-settings"></i></b>Task</a></li>

			<li><a href="logout.php"><b><i class="icon-power"></i></b>Logout</a></li>
		</ul>

	</div>

<section class="contents">
	<div class="Dashboard_head">
		<h2>INQUISITIVE</h2>
		<b>Welcome, <i ><?php echo $_SESSION['username']; ?></i></b>
	</div>


	<div class="page_info">
		<h4><span style="color: #204060;">Home Page</span>/ Courses</h4>
	</div>

<div class="sub-head"> 

<div class="search-div">
	<input type='search' style="color:black" placehoder="search for course">
		<div class="searchBtn"><b>Search</b></div>
</div>

<div class="addNewCourse"> 
 <a href="courses.php"><b> Add Course</v> </a>
</div>

</div>

	<div class="content_container">

<div class="school_panels">
			<div class="panel_icons">
				<li><b class="icon-fort-awesome"></b></li>
				<h3>School ALL</h3>
			</div>
			<div class="items">
				<h3 style="margin-top: 10px;margin-left: 3px;">School</h3>
				<li><h3>25</h3></li>
			</div>
</div>

<div class="school_panels">
			<div class="panel_icons">
				<li><b class="icon-school"></b></li>
				<h3>Teachers All</h3>
			</div>
			<div class="items">
				<h3 style="margin-top: 10px;margin-left: 3px;">Teachers</h3>
				<li><h3>22</h3></li>
			</div>
</div>



<div class="school_panels">
			<div class="panel_icons">
				<li><b class="icon-file"></b></li>
				<h3>Subjects</h3>
			</div>
			<div class="items">
				<h3 style="margin-top: 10px;margin-left: 3px;">Subjects</h3>
				<li><h3>35</h3></li>
			</div>
</div>




	</div>

</section>




<script type="text/javascript">
	$(document).ready(function(){

		sliding();

	})


	
	function open_bar(){
		$('.side_nav').css('left','0');
		$('#open_bar').hide();
		$('#close_bar').show();
	}
	function close_bar(){
		$('.side_nav').css('left','-250px');
		$('#open_bar').show();
		$('#close_bar').hide();
	}


	// image slider...





</script>
</body>
</html>