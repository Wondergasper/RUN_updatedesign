<?php
# Database Connection Variable

$serverName = "localhost";
$DBusername = "root";
$password = "";
$database = "v-anonymous";


# Database Variable connection handle
$conn = mysqli_connect($serverName, $DBusername, $password, $database) or die(mysqli_connect_error());;
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} // Add closing brace here


