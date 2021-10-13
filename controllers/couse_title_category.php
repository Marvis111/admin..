<?php
include 'server.php';

$q = $_REQUEST['q'];
$courseDetails = explode(',', $q);
//get the couse details.
$courseTitle = $courseDetails[0];
$courseCategory = $courseDetails[1];

$userName = $_SESSION['username'];
$userId = get_User_Name($conn,$userName);
// date created
$dateCreated = date('Y:M: h:ia');
// insert the course created by a user into the userCouse table..

$sql = "INSERT INTO uses_course (userId,course_title,course_category,dateCreated)
	values('$userId','$courseTitle','$courseCategory','$dateCreated') ";
 mysqli_query($conn,$sql);