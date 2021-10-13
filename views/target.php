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
			<li><a href="target.php"><b><i class="icon-home"></i></b>Target</a></li>
			<li><a href="curriculum.php"><b><i class="icon-person"></i></b>Curriculum</a></li>
			<li><a href=""><b><i class="icon-settings"></i></b>Edit</a></li>
			<li><a href=""><b><i class="icon-settings"></i></b>Set up</a></li>
			<li><a href=""><b><i class="icon-message"></i></b>Information</a></li>

			<li><a href="../registrations/logout.php"><b><i class="icon-power"></i></b>Logout</a></li>
		</ul>

	</div>

<section class="contents">
	<div class="Dashboard_head">
		<h2>INQUISITIVE</h2>
		<b><i ><?php echo $_SESSION['username']; ?></i></b>
	</div>


	<div class="page_info">
		<h4><span style="color: #204060;">Course</span>/ <?php 
			$userId =	get_User_Name($conn,$_SESSION['username']);
			$courseName = get_User_Current_Course_Name($conn,$userId); 
			echo $courseName;
		 ?> </h4>
	</div>
<h3 id="courseKind" style="margin:20px;font-size:30px;text-shadow: 1px 2px 3px;">Target your Students </h3>


<div class="successDiv"></div>

	<div class="courseChoice">
	  
	  <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">What will your Student learn in your Course</h3>
	 <h6 style="margin-top:10px;"><i> You can provide a summary of your course...<i></h6>
	 <input  type="text" id="courseSummary" class="courseField" placeholder="e.g Basic knowledge of Programming in C#">
	 
	 <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Are there any prerequisite ?</h3>
	 <h6 style="margin-top:10px;"><i> What do you think your student should know first..<i></h6>
	<input  type="text" class="courseField" id="coursePrerequisite" placeholder="e.g Must be able to program in any language aside  C#">
	<h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Who are your target Students ?</h3>
	 <h6 style="margin-top:10px;"><i> Which categories of students do you expect to take your course?<i></h6>
	<input  type="text" class="courseField" id="studentTarget" placeholder="e.g Intermediate level students in Programming">
	
	 
	 <div class="submitCourse">
	 	<b>Set target</b>
	 	</div>
	 	
	</div>
	
	



</section>


<style type="text/css">
	.success{
		width: 80%;
	}
</style>

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
$(document).on('click','.closeSuccess',function(){
	$('.success').fadeOut();
})

$(document).on('click','.submitCourse',function(){

	var courseSummary = $('#courseSummary').val();
	var coursePrerequisite = $('#coursePrerequisite').val();
	var studentTarget = $('#studentTarget').val();

		if (courseSummary == "") {
		alert('Summary of Course field is required.');
	}
	if (studentTarget == "") {
		alert('Targe students field is required.');
	}
	if (coursePrerequisite == "") {
		alert('couse is required.');
	}

	if (courseSummary !="" && studentTarget !="" && coursePrerequisite !="") {
		var courseTarget = new Array(
			courseSummary,
			coursePrerequisite,
			studentTarget
			);
		$.ajax({
			url:'../controllers/course_target.php?q='+courseTarget,
			method:'GET',
			success:function(data){
				$('input').val("");
				$('.successDiv').html(data);
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