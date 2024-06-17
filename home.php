<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RUN - Anonymous Messages | Your Words, Your Pictures, Your Anonymity</title>
<link href="assets/images/icon.png" rel="icon">
<style>
  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    font-family: Arial, sans-serif;
    background-color: black;
  }

  .logo {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: fadeOut 4s ease-in-out;
  }
  
  @keyframes fadeOut {
    0% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }
</style>
</head>
<body>
  <div class="logo">
    <img src="assets/images/cover.png" alt="RUN - Anonymous Messages" width="460">
  </div>

  <script>
    setTimeout(function() {
      window.location.href = "home.php";
    }, 4000);
  </script>
  
</body>
</html>
