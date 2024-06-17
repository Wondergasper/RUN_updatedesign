<?php
    require_once('dbconn.php');
    extract($_POST);
    $message       = trim($usermessage);
    $pictureStatus = trim($picture_hidden_tag);
    $userName      = trim($user_name);


    
    $sql = "SELECT * FROM user_message";
    $result = mysqli_query($conn, $sql) or die(mysql_error());
    if($result){
        if($pictureStatus == 'T'){
            $sql = "INSERT INTO user_message(user_id,user_message,image_status,message_reciever) 
            VALUES(NULL,'$message','$pictureStatus','$userName')";
            $result = mysqli_query($conn, $sql);
        
            if($result == true){
                $sql = "SELECT user_id FROM user_message WHERE user_message='$message'";
                $result = mysqli_query($conn, $sql) or die(mysql_error());
                $row = mysqli_fetch_assoc($result);   
                // $userId = $row['user_id'];
                $userId = $row['user_id'];
                
                $upload_dir = 'anonymous_image';
                

                if(is_dir($upload_dir)){
                    //Directory already exist
                }else{//create the directory
                    mkdir($upload_dir);
                }

                // $i = 1;
                $targetFile  = $upload_dir.'/'.$userId.'.jpg';    
                // echo $targetFile;            

                if(file_exists($targetFile))
                {
                    unlink($targetFile);//unlink php function deletes the file
                }

                if(move_uploaded_file($_FILES['userfile']['tmp_name'], $targetFile))//uploads the file in the directory
                {
                    echo 1;
                }else{
                    echo -1;
                }

            }else{
                echo -1;
            }         
        }else{
            $sql = "INSERT INTO user_message(user_id,user_message,image_status,message_reciever) 
            VALUES(NULL,'$message','$pictureStatus','$userName')";
           
            $result = mysqli_query($conn, $sql);    
            if($result == true){
                echo  1;
            }else{
                echo  -1;//-1 is unable to insert record
            }           
        }
    }else{
    
    }

?>  