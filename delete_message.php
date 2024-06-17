<?php
session_start();

if(isset($_SESSION['login_state']) && !empty($_SESSION['login_state'])){
    require_once('dbconn.php');

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $messageId = $_GET['id'];
        $userName = $_SESSION['username'];

        // Validate that the message belongs to the logged-in user
        $sql = "DELETE FROM messages WHERE id = $messageId AND username = '$userName'";
        if (mysqli_query($conn, $sql)) {
            header("Location: messages.php");
            exit;
        } else {
            echo "Error deleting message: " . mysqli_error($conn);
        }
    } else {
        header("Location: message.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
