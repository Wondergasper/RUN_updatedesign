<?php
    session_start();

    if(isset($_SESSION['login_state']) && !empty($_SESSION['login_state'])){
        $userName = $_SESSION['username'];
    
    }else{
        header("Location:login.html");
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
    <title>My Profile | RUN - Anonymous Messages </title>
    <link href="assets/images/icon.png" rel="icon">
</head>
<body>
   
    <div class="profile-page">
    
            <div class="head">
                <div class="head-section">
                    <h1>Hi, <?=$userName?></h1>
                    <!-- <p>V - Anonymous Messages</p> -->
                    <p id = "userlink">localhost/Redeemer's-Univerity/chatintro.php?=<?=$userName?></p>      
                </div>
                <div class="head-section-right">  
                    
                </div> 
            </div>
        <div class="tail">
           
           
                <div class="view">
                    <h3 style = "text-transform:capitalize"><?=$userName?>'s Profile</h3>
                    <div class="right"><a href="#" onclick = "
                    copyUserLink()">Copy Link</a></div>
                </div>
                        <a style="margin-bottom: 40px;" href="messageintro.php" class="mid">View Messages</a>
                        
                        <a style="margin-bottom: 40px; background-color: #6574ff;" href="#" class="mid">Share My Profile</a>
                        <a style="margin-bottom: 40px; background-color: #128C7E;" href="#" class="mid">Share on WhatsApp</a>
                        <a style="background-color: #dd2a7b" href="#" class="mid">Share on Instagram</a>


                        <div class="components">
                            <div class="left">
                            <h3>Terms and Conditions</h3>
                            <p>Click icon to navigate to terms</p>
                            </div>
                             <div class="right">
                                <a href="terms.php">
                                    <img src="assets/images/right-arrow.png" alt="">
                                </a>
                            </div>
                        </div>
                
           <!--- check later
                <div class="components">
                    <div class="left">
                    <h3>Step 2: Share Link</h3>
                    <p>click icon to copy</p>
                    </div>
                    <div class="right">
                        <img src="assets/images/right-arrow.png" alt="">
                    </div>
                </div>
                <div class="components">
                    <div class="left">
                    <h3>Lorem.</h3>
                    <p>Lorem, ipsum dolor.</p>
                    </div>
                    <div class="right">
                        <img src="assets/images/right-arrow.png" alt="">
                    </div>
                </div>
            -->
            </div>
        </div>
        
        
    </div>


<script src="assets/js/index.js"></script>

<script>
    function copyUserLink(){
        let copyText =  document.getElementById('userlink');
        let range = document.createRange();
        range.selectNode(copyText);
        
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    
        document.execCommand("copy");
        alert('copied successfully');

        

        
    }
</script>
</body>
</html>