<?php
ob_start();
require('dbconn.php');

// Check if the form is submitted
if (isset($_POST['update'])) {
    $username = $_POST['username']; // Changed from 'uname' to 'username'
    $new_password = $_POST['passnew'];
    $confirm_password = $_POST['passconfi'];

    // Check if the username exists in the database
    $sql = "SELECT * FROM user_account WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Validate the input data
        if (empty($username) || empty($new_password) || empty($confirm_password)) {
            echo "<script type='text/javascript'>alert('Please fill in all fields')</script>";
        } elseif ($new_password != $confirm_password) {
            echo "<script type='text/javascript'>alert('Passwords do not match')</script>";
        } else {
            // Update the password in the database
            $sql = "UPDATE user_account SET user_password=? WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_password, $username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script type='text/javascript'>alert('Password updated successfully')</script>";
                header("Refresh:0.01; url=index.php", true, 303);
            } else {
                echo "<script type='text/javascript'>alert('Error updating password')</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('The username you entered does not exist')</script>";
    }
}
?>

<!-- HTML code remains the same -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Change Password | RUN - Anonymous Messages </title>
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


            <a href="index.php"><img src="assets/images/cover.png" alt="" class="img-fluid"></a>
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
                    <!--<form action="profilepage.php" method="#">-->

                    <form method="POST" action="changepass.php">
                        <!--add any id format you want, it's not added yet-->

                        <!-- Password input -->

                        <div class="form-outline mb-4">
                            <input type="uname" placeholder="" name="username" id="uname" required="" class="form-control form-control-lg" />
                            <span class="error" id="errorMessage"></span>
                            <label class="form-label" for="form1Example23">username</label>
                        </div>


                        <div class="form-outline mb-4">
                            <input type="password" placeholder="" name="passnew" id="passnew" required="" class="form-control form-control-lg" />
                            <span class="error" id="errorMessage"></span>
                            <label class="form-label" for="form1Example23">New Password</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" placeholder="" name="passconfi" id="passconfi" required="" class="form-control form-control-lg" />
                            <span class="error" id="errorMessage"></span>
                            <label class="form-label" for="form1Example23">Confirm Password</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">



                        </div>

                        <!-- Submit button -->
                        <button type="submit" value="Submit" name="update" class="btn btn-primary btn-lg btn-block">Change Password</button>


                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- End your project here-->




    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->



</body>


<!-- Login End -->

</html>
