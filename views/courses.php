<?php 
	include '../controllers/server.php';
	include '../controllers/sessionController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refrhesh" content="3">
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
		<b><i ><?php echo $_SESSION['username']; ?></i></b>
	</div>


	<div class="page_info">
		<h4><span style="color: #204060;">Home Page</span>/ Courses</h4>
	</div>
<h3 id="courseKind" style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px #000000;text-align:center">What Kind of Course Are you creating? </h3>

<div class="courseChoice">
	<div class="createCourse" id="createCourse">
		  <div class='courseIcon'>
		  	<b><i class="icon-book"></i></b>
		  </div>
		  <h3> Course</h3>
		  <p>
		  	Create rich learning references with the help of video lectures, quizes, coding exercise etc.
		  	
		  </p>
		  
		 </div>

		<div class="createCourse" id="createTest"> 
		<div class='courseIcon'>
		  	<b><i class="icon-book"></i></b>
		  </div>
		  <h3> Practice Test</h3>
		  <p>
		  	Create rich learning practice test with the help of video lectures, quizes, coding exercise etc.
		  	
		  </p>
		  
		
		
		</div>
	
	</div>
	
	<div class="courseChoice">
	  
	  <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Provide a working Title </h3>
	 <h6 style="margin-top:10px;"><i> A good course deserves a good title...<i></h6>
	 <input  type="text" id="courseTitle" class="courseField" placeholder="Enter the Title of your Course">
	 
	 <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">What Category does your course belongs to? </h3>
	 <h6 style="margin-top:10px;"><i> Course category helps to easy identify where your course belongs...<i></h6>
	
	<select id="selectCategories">
		<option value="0">Select Category </option>
		<option value="1">Humanities</option>
	 <option value="2">Law and Constitution </option>
	 <option value="3">Web Design/Development</option>
	 <option value="4"> It/Software</option>
	 <option value="5">Deep Learning </option>
	 </select>
	 <div class="submitCourse">
	 	<b>Create Course</b>
	 	</div>
	 	
	</div>
	
	



</section>




<script type="text/javascript">
	$(document).ready(function(){
  $(".courseChoice").hide();
  $(".courseChoice").first().show();
	})

$(document).on('click','#createCourse',function(){
	
	$(".courseChoice").animate({scrollLeft:$(this).width() },500).hide();
	$("#courseKind").hide();
  $(".courseChoice").eq(1).show();

	
})

$(document).on('click','.submitCourse',function(){
	var courseTitle = $('#courseTitle').val();
	var courseCategory = $('#selectCategories').val();

	if (courseTitle == "") {
		alert(' Course Title is required.');
	}
	if (courseCategory == 0) {
		alert('Course Category is required.');
	}

	if (courseTitle !=="" && courseCategory != 0) {

		var course = new Array(
			courseTitle,
			courseCategory
			);
		
		$.ajax({
			url:'../controllers/couse_title_category.php?q='+course,
			method:'GET',
			success:function(data){
			
				location.assign('target.php');
			}
		}) 
	}




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