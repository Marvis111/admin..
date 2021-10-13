<?php
include 'server.php';
//get alll the post data... 

$courseForm_Array  = array();

// i will hav have to give the contents /resource anew name...
$contentNewName='';

/* 
Array ( [name] => After the success of forming an examination council the council called a first meeting in accra Ghana on march 1953.docx [type] => application/vnd.openxmlformats-officedocument.wordprocessingml.document [tmp_name] => C:\xampp\tmp\phpC595.tmp [error] => 0 [size] => 13805 )


*/
if (isset($_POST['submitCourse'])) {
	$sectionNo = mysqli_real_escape_string($conn,$_POST['sectionNo']);
	$lessonNo = mysqli_real_escape_string($conn,$_POST['lessonNo']);

$lessonDesc = mysqli_real_escape_string($conn,$_POST['lessonDesc']);
$lessonResource = $_FILES['lessonResource'];
//proper validation
if (empty($sectionNo)) {
		array_push($courseForm_Array, 'Section Number is required.');
}
if (empty($lessonNo)) {
	array_push($courseForm_Array, 'Lesson No is required.');
}
 
	$courseContent = $_FILES['courseContent'];
	$allowedContentExtension  = array('pdf','docx','ppt','mp4');
// cours content file details..
$courseContent_name = $courseContent['name'];
$courseContent_tmp_name = $courseContent['tmp_name'];
$courseContent_size = $courseContent['size'];
$courseContent_error = $courseContent['error'];
//split the course content name into array to get the extension...
$courseContent_Split = explode('.', $courseContent_name);
$courseContentExt = end($courseContent_Split);

if ($courseContent_error == 0) {
	if (in_array($courseContentExt, $allowedContentExtension)) {
		if ($courseContent_size < 1000000) {
			// time here will make it unique instead of using uniqid
			$contentNewName = time().$_SESSION['username'].".".$courseContentExt;	
			
	}else{
			array_push($courseForm_Array, ' Course Content is too large.');
		}
	}else{
		array_push($courseForm_Array, 'You cannot upload Lesson Content of this extension.');
	}
}else{
	array_push($courseForm_Array, 'Error Uploading Lesson content.');
}

if (empty($lessonDesc)) {
	array_push($courseForm_Array, 'Lesson Description is required.');
}
// uploading  resources..

	$lessonResource = $_FILES['lessonResource'];
	$allowedContentExtension  = array('pdf','docx','ppt','mp4');
// cours content file details..
$courseContent_name = $lessonResource['name'];
$courseContenttmp_name = $lessonResource['tmp_name'];
$courseContent_size = $lessonResource['size'];
$courseContent_error = $lessonResource['error'];
//split the course content name into array to get the extension...
$courseContent_Split = explode('.', $courseContent_name);
$courseContentExt = end($courseContent_Split);

if ($courseContent_error == 0) {
	if (in_array($courseContentExt, $allowedContentExtension)) {
		if ($courseContent_size < 1000000) {
			$NewName = time().$_SESSION['username'].".".$courseContentExt;	
			
	}else{
			array_push($courseForm_Array, ' Resource Content is too large.');
		}
	}else{
		array_push($courseForm_Array, 'You cannot upload resource Content of this extension.');
	}
}else{
	array_push($courseForm_Array, 'Error Uploading resource content.');
}












}
//sectionNo,lessonNo,courseContent,lessonDesc,lessonResource


