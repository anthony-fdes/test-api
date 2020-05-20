<?php
$host = "localhost";
$username = "themesarcade";
$password = "Arcade@123#@!";
$db_name = "domains_check_list";

// Create connection to our database
$conn = new mysqli($host, $username, $password, $db_name);

// Handling connection errors if any
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>