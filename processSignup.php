<?php
	
    require_once('dbconn.php');

    extract($_POST);	
    $userName       = trim($uname);
    $email          = trim($email);
    $passWord       = md5(trim($password));
    
   

    $sql = "SELECT * FROM user_account WHERE username ='$userName'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO user_account(user_id,username,email,user_password) 
        VALUES(Null,'$userName','$email','$passWord')";
        $result = mysqli_query($conn, $sql);
        if($result == true)
        {
            echo 1;
        }
        else{
            echo -1;
        }
    }else{
        echo 0;
    }			 	
            
		
?>