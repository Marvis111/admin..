<?php 
	include '../controllers/course_curriculum.php';
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
	
	<link rel="stylesheet" type="text/css" href="styles.css">
	
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
<h3 id="courseKind" style="margin:20px;font-size:30px;">
	Course Curriculum for <i class="createdCourse"><?php echo $courseName; ?></i>
</h3>


	<div class="courseChoice" style="background:white;">
	  <h4 style="display:flex;
	   float:left;justify-content:flex-start;font-size:20px;margin-bottom:20px;"><i>Start putting your course by putting sections, lessions, lesson videos, quizes and assignments. If you intended to offer your course for free, the length of video should not exceed 2hrs.<i></h4>
	   
	  <div class="successDiv"></div>
	   
	 
	<form method="POST" action="curriculum.php" enctype="multipart/form-data">
		 <p style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Section Number</p>
	 <input  type="number" id="sectionNo" name="sectionNo" class="courseField" placeholder="e.g 1.0">
	 
	 <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Lesson Number</h3>
	<input  type="number" id="lessonNo" name="lessonNo" class="courseField" placeholder="e.g 1.0">
		
	<h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Lesson Content</h3>
	 <h6 style="margin-top:10px;"><i> You are priviledged to upload a video, PPT,PDF or Docx files<i></h6>
	<input  type="file" name="courseContent"  class="courseField" id="courseContent" placeholder="e.g Intermediate level students in Programming">
	
	<h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Lesson Description</h3>
	 <h6 style="margin-top:10px;"><i> Lesson descriptions let the student to get the summary of the lesson and it's contents <i></h6>
	<input  type="text" name="lessonDesc" class="courseField" id="lessonDesc" placeholder="e.g Introduction to Data Science">
	
	
	 <h3 style="margin-top:20px;font-size:30px;text-shadow: 1px 2px 3px ;text-align:center">Resources(Optional)</h3>
	 <h6 style="margin-top:10px;"><i> A resource is any type of document that can be used in the lecture by the students. The file is going to be seen as a lecture extra. Make sure the file is legible and not more than 1GB<i></h6>
	<input  type="file" name="lessonResource" class="courseField" id="lessonResource" >
	
	<input type="submit" name="submitCourse" class="submitCourse">



	</form>
	
	</div>
	
	



</section>


<style type="text/css">
	.courseField, select{
	height:40px;
	width:40%;
	border-radius:5px;
	border:1px solid black;
	margin-top:10px;
}
@media(max-width: 740px){
	.courseField, select{
		width: 90%;
	}
}

</style>

<script type="text/javascript">
	$(document).ready(function(){
  $(".courseChoice").hide();
  $(".courseChoice").first().show();
	})

	/*
$(document).on('click','.submitCourse',function(){
var sectionNo = $('#sectionNo').val();
var lessonNo = $('#lessonNo').val();
var courseContent = $('#courseContent').val();
var lessonDesc = $('#lessonDesc').val();
var lessonResource = $('#lessonResource').val();

	$.ajax({
		url:'../controllers/course_curriculum.php',
		method:'POST',
		data:{sectionNo,lessonNo,courseContent,lessonDesc,lessonResource},
		success:function(data){
			$('.successDiv').html(data);
		}
	})


	
	
})
*/




$(document).on('click','#createCourse',function(){
	
	$(".courseChoice").animate({scrollLeft:$(this).width() },500).hide();
	$("#courseKind").hide();
  $(".courseChoice").eq(1).show();

	
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