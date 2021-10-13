<?php
include 'server.php';

//get the incoming request...
$q = $_REQUEST['q'];
$course_Target = explode(',', $q);
//
$courseSummary = $course_Target[0];
$coursePrerequisite = $course_Target[1];
$studentTarget = $course_Target[2];

//  get user details..
$username = $_SESSION['username'];
$userId = get_User_Name($conn,$username);
//for the couse..]
$courseName = get_User_Current_Course_Name($conn,$userId); 
// INSERT THE DATA INTO THE DATABASE..
$sql = "INSERT INTO course_target (userId,courseName, course_sum, course_prerequisite, studentTarget)
 	values('$userId','$courseName','$courseSummary','$coursePrerequisite','$studentTarget') ";

 $query = mysqli_query($conn,$sql);
 if ($query) {
 	
 	echo "
 	<div class='success'>
	   	<h5><em> Course target for ".$courseName." successfully created!. </em> </h5>
	   	<div class='closeSuccess'>
	   		<b><i class='icon-times' style='color:red;font-size:25px;cursor:pointer;'>  </i></b>
	   		</div>
	   		
	   </div>


 	"	;
 }