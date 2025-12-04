<?php
session_start();

// Clear all session data
$_SESSION = [];

// Destroy session completely
session_destroy();

// Redirect to login
header("Location: login.php");
exit();
?>