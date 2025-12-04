<?php
session_start();
include('includes/db.php'); // Connects to your database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Insert into the correct table: messages
    $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message, seen, created_at) VALUES (?, ?, ?, ?, 0, NOW())");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        header("Location: contact.php?success=1");
        exit();
    } else {
        header("Location: contact.php?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: contact.php");
    exit();
}
?>

