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

$urlComponents = parse_url($url);
parse_str($urlComponents['query'], $params);

$userName = isset($params['username']) ? $params['username'] : '';

if (!empty($userName)) {
    $sql = $conn->prepare("SELECT * FROM signup WHERE username = ?");
    $sql->bind_param("s", $userName);
    $sql->execute();
    $result = $sql->get_result();

    if ($result && $result->num_rows > 0) {
        // User exists, continue
    } else {
        header("Location: profilepage.php");
        exit();
    }
} else {
    header("Location: profilepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="assets/images/icon.png" rel="icon">
    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/bootstrap5.css">
    <link rel="stylesheet" href="assets/css/chat.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transperant">
        <div class="container pt-2">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </div>
    </nav>

    <section>
        <div class="main container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3"></div>
                
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="main-img text-center">
                        <img style="padding-bottom: 120px;" src="assets/images/Logo.png" alt="" class="img-fluid pb-3">

                        <h2>Write a secret message to <?=$userName?></h2>
                        <p class="main-description pt-2"></p>
                        <!-- $productImage		  = "admin/male products/".$productId.".jpg";
                        echo "<a href='".$productUrl."' class='product-grid-image'>"; -->
                        
                        <a href="chat.php?=<?php echo $userName?>">
                            <button class="btn btn-sz-primary">Proceed</button>
                        </a>   
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-3"></div>
            </div>
        </div>
    </section>
</body>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap5.js"></script>
    <script src="assets/css/chat.css"></script>
</html>