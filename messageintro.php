<?php
session_start();

if (isset($_SESSION['login_state']) && !empty($_SESSION['login_state'])) {
    $userName = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit; // Add this to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Messages</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/icon.png" rel="icon">

    <link rel="stylesheet" href="assets/css/bootstrap5.css">
    <link rel="stylesheet" href="assets/css/style2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .download-btn {
            background-color: #00027C;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .download-btn:hover {
            background-color: whitesmoke;
            color: #00027C;
        }

    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transperant">
        <div class="container pt-2">
           
           
            <div class="collapse navbar-collapse" id="navbarNav">
               
            </div>
        </div>
    </nav>

    <section>
        <div class="main container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3"></div>
                
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="main-img text-center">
                        
                        <img src="assets/images/banner1.png" alt="" class="img-fluid pb-3">

                        <!-- <h2>Message 1.</h2> -->

                    </div>
                </div>     
                
            </div>

            <?php
                require_once('dbconn.php');
                $sql = "SELECT * FROM user_message WHERE message_reciever ='$userName' ORDER BY user_id DESC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $userMessage = $row['user_message'];
                    $userId = $row['user_id'];
                    $productImage = "anonymous_image/" . $userId . ".jpg";    
                        echo "<div class='row'>
                                <div class='col-12 col-sm-12 col-md-12 col-lg-3'></div>
                                    <div class='col-12 col-sm-12 col-md-12 col-lg-6'>
                                        <div class='main-img text-center'>
                                        <h2>$userMessage</h2>
                                        <img src='".$productImage."' alt='' class='img-fluid pb-3' width = '500px'>
                                    </div>
                                </div>
                            </div>"; 
                    }   
               
            ?>
           
            
                
           

        <center><a href="profilepage.php" class="goback">My Profile</a></center>
    </section>

   

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap5.js"></script>
<script src="assets/js/onboarding.js"></script>

</body>

</html>