<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Login | RUN - Anonymous Messages  </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-login-form.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="assets/images/icon.png" rel="icon">
</head>
     
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
   
       
       <a href="index.html"><img src="assets/images/cover.png" alt="" class="img-fluid"></a>
      </div>

      

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
    </style>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="assets/images/login.png" class="img-fluid" alt="RUN - Anonymous Messages">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form method="#" id = "signIn">

           
              <!--add any id format you want, it's not added yet-->

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" placeholder="" name="email" required="" id="email" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example13">Email Address</label>
              </div>
  
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" placeholder="" name="password" id="password" required="" class="form-control form-control-lg" />
                <span class="error" id="errorMessage"></span>
                <label class="form-label" for="form1Example23">Password</label>
              </div>
  
              
              <!-- Submit button -->
              <button type="button" value="Submit" class="btn btn-primary btn-lg btn-block" onclick = "signIN()">Login</button>
  
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted">Powered By RUNTechSpace</p>
              </div>

             
              
            </form>
           
          </div>
        </div>
      </div>
    </section>
    <!-- End your project here-->

   

    <script src = "assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script>
        function signIN(){
          var email = $("#email").val();
          var password = $("#password").val();
          
          if(email == ''|| password == ''){
            alert("Please all fields are required");
          }else{            
            var formData = $("form#signIn").serialize();
            $.ajax({ 
                type:"POST",
                url: "processSignin.php",     
                data:formData,
                success:function(returnData){	  
                  if(returnData == 1){
                    alert("You Have Login Successfully !");
                    window.location.href="profilepage.php";
                  }else if(returnData == 0){
                    alert("Record does not exist");
                    $("#email").focus();
                  }
                }
            });   
          }
        }
    </script>
    
    <!-- Custom scripts -->
 


  </body>

  


   <!-- Login End -->



</html>