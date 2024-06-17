<?php
session_start();
require_once('dbconn.php'); // Ensure this file contains the database connection details

// Improved error handling
try {
  // Check if table exists
  $tableCheckQuery = "SHOW TABLES LIKE 'user_messages'";
  $result = $conn->query($tableCheckQuery);
  if ($result->num_rows == 0) {
    throw new Exception("Table 'user_messages' does not exist. Please create the table first.");
  }

  // Fetch messages from the database
  $query = "SELECT user_id, user_message, message_text FROM user_message WHERE user_id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $_SESSION['user_id']); // Replace with the actual session variable for user ID
  $stmt->execute();
  $result = $stmt->get_result();
  $messages = $result->fetch_all(MYSQLI_ASSOC);

  $stmt->close();
  $conn->close();
} catch (mysqli_sql_exception $e) {
  die("Database error: " . $e->getMessage());
} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Messages</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/icon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="gallery/vendor/aos/aos.css" rel="stylesheet">
  <link href="gallery/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="gallery/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="gallery/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="gallery/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="gallery/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="gallery/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <a href="#"><img src="gallery/vendor/icon.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        
          <li><a class="getstarted scrollto" href="proflepage.html">Back</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        
          <p>My Messages</p>
        </div>

        

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/images/IMG_6458.JPG" class="img-fluid" alt="">
              <div class="portfolio-links">
                <!-- the title tag is where the message will go in peace-->
                <a href="assets/images/IMG_6458.JPG" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Message 1">
                  <i class="bi bi-plus"></i></a>
                  <a href="delete_message.php?id=<?php echo $message['id']; ?>" title="Delete">
                      <i class="bi bi-trash"></i>
              </div>
              <div class="portfolio-info">
              <h4><?php echo htmlspecialchars($message['message']); ?></h4>
                
              </div>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No messages found.</p>
          <?php endif; ?>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/images/IMG_8130.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <!-- the title tag is where the message will go in peace-->
                <a href="assets/images/IMG_8130.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Message 2">
                  <i class="bi bi-plus"></i></a>
                <a href="#" title="Delete"><i class="bi bi-trash"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Message 2</h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/images/background.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <!-- the title tag is where the message will go in peace-->
                <a href="assets/images/background.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Message 3">
                  <i class="bi bi-plus"></i></a>
                <a href="#" title="Delete"><i class="bi bi-trash"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Message 3</h4>
                
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Section -->

  

  <!-- Vendor JS Files -->
  <script src="gallery/vendor/aos/aos.js"></script>
  <script src="gallery/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="gallery/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="gallery/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="gallery/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="gallery/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="gallery/js/main.js"></script>

</body>

</html>