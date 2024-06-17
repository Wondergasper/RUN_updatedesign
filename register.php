<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Register | RUN - Anonymous Messages  </title>
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
   
       
       <a href="index.html"><img src="assets/images/cover.png" alt="#" class="img-fluid"></a>
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
            <img src="assets/images/register.png" class="img-fluid" alt="RUN - Anonymous Messages">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="login.html" method="#" id = "signup">

              <!--add any id you want, it's not added yet-->

              <!-- Username -->

               <div class="form-outline mb-4">
                <input type="text" placeholder="" name="uname" id = "uname" required="" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example13">Username</label>
              </div>
  
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" placeholder="" name="email" id = "email" required=""  class="form-control form-control-lg" />
                <label class="form-label" for="form1Example13">Email Address</label>
              </div>
  
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" placeholder="" name="password" id = "password" required="" pattern=".{8,}" title="Password needs to consist of a minimum of 8 characters" class="form-control form-control-lg" />
                <span class="error" id="errorMessage"></span>
                <label class="form-label" for="form1Example23">Password</label>
            </div>
            
  
              <div class="d-flex justify-content-around align-items-center mb-4">
                <!-- Checkbox -->
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                   required
                    
                    checked
                  />
                  <label class="form-check-label" required> I agree to the  <a href="terms.html">Terms and Conditions</a></label>
                </div>
               
              </div>
  
              <!-- Submit button -->
              <button type="button" value="Submit" class="btn btn-primary btn-lg btn-block" onclick  = "signuUP()">Sign Up</button>
  
             
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted">Already have an account?</p>
              </div>

              <a class="btn btn-primary btn-lg btn-block" style="background-color: rgb(123, 121, 121)" href="login.php" role="button">
                <i class="fab fa-facebook-f me-2"></i>Login
              </a>
              
            </form>
           
          </div>
        </div>
      </div>
    </section>
    <!-- End your project here-->
      
   

    <script src = "assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#uname").focus();
      });
      function signuUP(){
        var username = $("#uname").val();
        var email    = $("#email").val();
        var password = $("#password").val();
        if(username == '' || email == '' || password == ''){
          alert('please fill up the form');
        }else{
          var response = confirm("You are signing in ?");
          if(response == true){
            var formdata = $("form#signup").serialize();
            $.post("processSignup.php",formdata).done(function(returndata){
              if(returndata == 1){
                alert("Detail inserted successfully !");
                window.location.href="login.php"
                clearFields();
              }else if(returndata == -1){
                alert("Error inserting details");
              }else if(returndata == 0){
                alert("Record exist already");
              }
            });
          }
        }
      }
      
      function clearFields(){ 
        $("#uname").val('');
        $("#email").val('');
        $("#password").val('');      
      }      
    </script>
    <!-- Custom scripts -->
 


  </body>

  


   <!-- Login End -->



</html>