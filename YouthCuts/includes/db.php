<?php
// Replace these with your InfinityFree details
$servername = "sql309.infinityfree.com";   // MySQL Hostname
$username   = "if0_40582219";      // Your DB Username
$password   = "Fo7YDMUOjv";   // Your DB Password
$dbname     = "if0_40582219_jordon_db";   // Your DB Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
