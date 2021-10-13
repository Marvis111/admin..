<?php
date_default_timezone_set('Africa/Lagos');
session_start();
 $dbServername ='localhost';
$dbUsername="root";
$dbPassword="";
$lifestyle_database = 'inquisites';
 $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$lifestyle_database);


$login_err_Array = array();

//db variables
$sqlQuery=$sql="";
class lifeStyle_user{
	private $username,$user_email,
	$user_address,$user_pwd,$user_comf_pwd;

	private function validate_user_name($username){
		if (!empty($username)) {
			$username = trim($username);
			$username = htmlspecialchars($username);
			$username = stripslashes($username);
			return true;
		}else{
			array_push($GLOBALS['login_err_Array'], 'Username is required.');
			return false;
		}
	}
	private function validate_user_email($user_email){
		if (!empty($user_email)) {
			if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
				array_push($GLOBALS['login_err_Array'], 'Invalid Email address');
				return false;
			}else{
				return true;
			}
		}else{
			array_push($GLOBALS['login_err_Array'], 'Email is required.');
			return false;
		}
	}

	private function validate_user_pwd($user_pwd,$user_comf_pwd){
		if (!empty($user_comf_pwd) && !empty($user_pwd)) {
			if ($user_pwd == $user_comf_pwd) {
				return true;
			}else{
				array_push($GLOBALS['login_err_Array'], 'Password Mismatched.');
				return false;
			}
		}else{
			array_push($GLOBALS['login_err_Array'], 'Password is required.');
			return false;
		}
	}


	 function __construct($username,$user_email,$user_pwd,$user_comf_pwd){
	 	if ( $this->validate_user_name($username) && 
	 		 $this->validate_user_email($user_email) &&
	 		 $this->validate_user_pwd($user_pwd,$user_comf_pwd)) {
	 		$user_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);
	 		$GLOBALS['sql'] = "INSERT INTO user_login(user_name,user_email,user_password)
	 			values('$username','$user_email','$user_pwd') ";
	 			$GLOBALS['sqlQuery'] = mysqli_query($GLOBALS['conn'],$GLOBALS['sql']);
	 			$_SESSION['username'] = $username;

	 		//create user order table...

	 			header('location:../views/index.php');
	 	}
	 }

}


/**
 * 
 */
$rowResult = $enc_pwd ="";
$aut_userPwd;
class users{
	private $user_email,$user_pwd;

	private function validate_user_email($user_email){
		if (!empty($user_email)) {
			if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
				array_push($GLOBALS['login_err_Array'], 'Invalid Email Address');
				return false;
			}else{
				return true;
			}
		}else{
				array_push($GLOBALS['login_err_Array'], 'Email is required.');
				return false;
			}
	}

	private function validate_pwd($user_pwd){
		if (!empty($user_pwd)) {
			return true;
		}else{
			array_push($GLOBALS['login_err_Array'], 'Password is required.');
			return false;
		}
	}




	function __construct($user_email,$user_pwd){
		if ($this->validate_user_email($user_email) &&
			$this->validate_pwd($user_pwd) 
	) {
		$GLOBALS['sql'] = " SELECT * FROM user_login where user_email='$user_email' ";
		$GLOBALS['query'] = mysqli_query($GLOBALS['conn'],$GLOBALS['sql']);
		if ($GLOBALS['query']) {
			$GLOBALS['rowResult'] = mysqli_fetch_assoc($GLOBALS['query']);
			$GLOBALS['enc_pwd'] = $GLOBALS['rowResult']['user_password'];
			//echo $GLOBALS['enc_pwd'];
			$GLOBALS['aut_userPwd'] = password_verify($user_pwd,$GLOBALS['enc_pwd']);
			if ($GLOBALS['aut_userPwd'] ==1 ) {
				$_SESSION['username'] = $GLOBALS['rowResult']['user_name'];
				header('location:../views/index.php');
			}else{
				array_push($GLOBALS['login_err_Array'],'Wrong Email/Password combination.');
				return false;
			}
	
		}


				
	  }
	}



}

if (isset($_POST['signIn'])) {
	new lifeStyle_user($_POST['user_name'],
		$_POST['user_email'],
		$_POST['user_password'],$_POST['user_Comf_password']);
}

if (isset($_POST['login'])) {
	new users($_POST['user_email'],$_POST['user_pwd']);
}

function get_User_Name($conn,$userName){
	$sql = "SELECT * FROM user_login where user_name = '$userName' ";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		while ($row = mysqli_fetch_assoc($query)) {
			return $row['id'];
		}
	}
}

function get_User_Current_Course_Name($conn,$userId){
	$sql = "SELECT * FROM uses_course where userId = '$userId'
	 ORDER BY dateCreated DESC limit 1 ";
	$query = mysqli_query($conn,$sql);
	if ($query) {
		while ($row = mysqli_fetch_assoc($query)) {

			return  $row['course_title'];
		}
	}
}

/*
 <div class="success">
	   	<h5><em> Section 1 has been successfully created! </em> </h5>
	   	<div class="closeSuccess">
	   		<b><i class='icon-times' style="color:red;font-size:25px;cursor:pointer;">  </i></b>
	   		</div>
	   		
	   </div>\





	    if(empty($username)){
           array_push($formErrArray,'Username is required.');
       };
       if(!empty($email)){
           if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         array_push($formErrArray,'Invalid Email Address');
           }
       }else{
        array_push($formErrArray,'Email is required');
    }
       if(!empty($pincode)){
        if(strlen($pincode) !== 6 ){
            array_push($formErrArray,'Pincode must be exactly 6 digits');
        }
    }else{
        array_push($formErrArray,'Pincode is required!.');
    }

       if(count($formErrArray) > 0 ){
        return view('registrations.signup')->with('formErrArray',$formErrArray);
       }
       if(count($formErrArray) == 0 ){
        //   $atgUser = 
        $atgUser = new ATGUser([
            'username' => $username,
            'email' => $email,
            'pincode' => $pincode
        ]);
        $atgUser->save();
  
    
      //  return redirect()->route('signup.handler')->with('success','Data successfully added.');


       }
      


 */