<?php		
	require_once('dbconn.php');
	session_start();
	$_SESSION['login_state']='';
	
	extract($_POST);
	$email 		= trim($email);
	$password 	= md5(trim($password));

	
	$sql 		= "SELECT * FROM user_account WHERE email ='$email'";
	$result 	= mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result) == 1){
		
		$fetchRow    	= mysqli_fetch_array($result);
		$userName   	= $fetchRow['username'];
		$getEmail 		= $fetchRow['email'];
		$getPassword 	= $fetchRow['user_password'];
	

		if($email == $getEmail && $getPassword == $password){
		
			$_SESSION['login_state']  = $fetchRow;
			$_SESSION['username'] = $userName;
	
			echo 1;
		}else{
			echo 0;
		}
	}else{			
		echo 0;
	}
?>