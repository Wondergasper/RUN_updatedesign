<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require 'dbconn.php';
    session_start();

    $msg = "";

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    $username = $_SESSION['username'];

    if (isset($_POST['submit'])) {
        $passold = sha1($_POST['passold']);
        $passnew = sha1($_POST['passnew']);
        $passconfi = sha1($_POST['passconfi']);

        // Check if the old password is correct
        $stmt = $conn->prepare("SELECT user_password FROM user_account WHERE username=?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && $row['user_password'] === $passold) {
            if ($passnew === $passconfi) {
                // Update the password
                $stmt_u = $conn->prepare("UPDATE user_account SET user_password=? WHERE username=?");
                if ($stmt_u === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }
                $stmt_u->bind_param('ss', $passnew, $username);
                if ($stmt_u->execute()) {
                    $msg = "Password changed successfully!<br><a href='login.php'>Login Here</a>";
                } else {
                    $msg = "Error updating password!";
                }
            } else {
                $msg = "Passwords do not match!";
            }
        } else {
            $msg = "Old password is incorrect!";
        }
    }