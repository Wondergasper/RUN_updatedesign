<?php
require_once('dbconn.php');

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}

// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

$url_parts = explode("=", $url);
$userName = end($url_parts);
$userName = mysqli_real_escape_string($conn, $userName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/images/icon.png" rel="icon">
    <title>Chat</title>
    <!-- StyleSheet-->
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-login-form.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    
   
  



</head>

   
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
         <h1 class="text-light"><a href="#"><span>Message</span></a></h1>
        
      </div>

      <nav id="navbar" class="navbar">
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- Login Form -->                    
  
  <body>
    <!-- Start your project here-->
  
    <style>
      .divider:after,
      .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
      }
      .error {
        color: red;
     }
     #message-popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f9f9f9;
      padding: 20px;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    </style>
    
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="assets/images/sent.png" class="img-fluid" alt="">
          </div>
          
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <?php

              $sql = "SELECT * FROM user_account WHERE username ='$userName'";
              $result = mysqli_query($conn,$sql);
              if($result){
                /*$numRow = mysqli_num_rows($result);*/
                if(mysqli_num_rows($result) >0 ){
                  echo "<form id = 'userForm' name = 'userForm' method='POST'>
                      <div class='form-outline mb-4'>
                        <input type='text' placeholder= '' name ='usermessage' id='message' required='' class='form-control form-control-lg' style='width: 100%; height: 100px;'>
                        <label class='form-label' for='form1Example23'>* Message</label>
                      </div>
                      <div class='divider d-flex align-items-center my-4'>
                        <p class='text-center fw-bold mx-3 mb-0 text-muted'>Add a picture if needed </p>
                      </div>
                      <div class='form-outline mb-4'>
                        <input type='file' id='documentUpload' name='userfile' class='form-control form-control-lg' accept='.pdf, .doc, .docx, .jpg, .jpeg, .png, .gif'>
                        <input type='hidden' id='picture_hidden_tag' name='picture_hidden_tag' value='F'>
                        <input type='hidden' id='user_name' name='user_name' value='$userName'>
                        <label class='form-label' for='documentUpload'></label>
                      </div>
                      <!-- to display screenshot fix later abeg
                      <div class='form-outline mb-4'>
                      <img id='imagePreview' class='img-fluid' alt='Image Preview' style='display: none;'>
                      </div>
                        -->
                      <!-- Submit button -->
                      <button type='button' value='button' class='btn btn-primary btn-lg btn-block' onclick = 'sendMessage()'>Send anonymous message</button>
                    </form>";
                }else{
                  echo "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, delectus laboriosam? Libero, reiciendis autem quis tenetur fugit voluptatum animi ex odio in est dolore quia neque unde adipisci provident ullam";
                }   
              }else{
                header("location:404.php?Error=error");
              }
             
            ?>
          </div>
         
         
          
        </div>
      </div>
    </section>
   
    <!-- End your project here-->
    <script src = "assets/js/jquery.js"></script>          
    <script src="assets/js/mdb.min.js"></script>


    <script>
    
      function sendMessage(){
        var message = $("#message").val();
        var messageFile   = $("#documentUpload")[0].files.length;
    
        if(message == ''){
          alert('Please fill up the form');
        }else{
          if(messageFile == 1){
            $("#picture_hidden_tag").val("T");
          }
          feedback = confirm("Are you sure you want to send a message ?");
            var data = $("form#userForm")[0]; 	  
            var formData = new FormData(data); 
              if(feedback == true){
                $.ajax({                                
							    url: "SendUserMessage.php",
							    type: 'POST',
                  data: formData,
							    async: false,
							    cache: false,
							    contentType: false,
							    processData: false,
							    success: function (e){  
                    if(e == 1){
                      window.location.href="messagesuccess.php?Message=success";
                      clearFields();
                    }else if(e == -1){
                      alert('There is an error somewhere');
                    }else{
                      
                    }
							    }
						    });	
              }
        }
      }

      function clearFields(){ 
        $("#message").val('');
        $("#documentUpload").val('');  
        $("#picture_hidden_tag").val("F"); 
          
      }      
    </script>
  </body>

  


   <!-- Login End -->



</html>