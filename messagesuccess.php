<?php
    $successMessage = $_GET['Message'];
    if($successMessage == 'success'){

    }else{  
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/59af9492ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/images/icon.png" rel="icon">
    <title>Success ✅</title>
</head>
<body style="background-image: url('assets/images/backgroundi.png'); background-size: cover;">

    <div class="container">
        <div class="success">
            <div class="success1">
                <img src="assets/images/check-mark.png" alt="">
            <h3>SUCCESS</h3>
            </div>

            <div class="success2">
                <p>The anonymous message has been sent.</p>
                <button class="btn2"><a href="https://en.wikipedia.org/wiki/Redeemer%27s_University_Nigeria">RUN on Wikipedia</a></button>
            </div>
        </div>
        <!-- <a href="https://www.flaticon.com/free-icons/tick" title="tick icons">Tick icons created by Octopocto - Flaticon</a>   -->
    </div>
</body>
</html>