<?php
session_start();
include('includes/db.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $service = trim($_POST['service']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);

    // Combine date and time into a datetime
    $appointment_datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
    $status = "pending";
    $created_at = date('Y-m-d H:i:s');

    // Insert into appointments table
    $stmt = $conn->prepare("
        INSERT INTO appointments (user_id, service, appointment_date, status, created_at)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("issss", $user_id, $service, $appointment_datetime, $status, $created_at);

    if ($stmt->execute()) {
        header("Location: dashboard.php?success=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
