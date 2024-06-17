<?php
ob_start();
require('dbconn.php');

// Check if the form is submitted
if (isset($_POST['update'])) {
  $username = $_POST['username'];
  $new_password = $_POST['passnew'];
  $confirm_password = $_POST['passconfi']; // Fixed typo here

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
      // Hash the new password
      $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

      // Update the password in the database
      $sql = "UPDATE user_account SET user_password=? WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $hashed_password, $username);
      $stmt->execute();

      // Check for errors
      if ($stmt->errno) {
        echo "<script type='text/javascript'>alert('Error updating password: " . $stmt->error . "')</script>";
      } else {
        echo "<script type='text/javascript'>alert('Password updated successfully')</script>";
        header("Refresh:0.01; url=index.php", true, 303);
        exit(); // Added exit() to prevent further execution
      }
    }
  } else {
    echo "<script type='text/javascript'>alert('The username you entered does not exist')</script>";
  }
}
?>

