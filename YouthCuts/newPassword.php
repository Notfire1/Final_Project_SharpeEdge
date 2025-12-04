<?php
session_start();
include('includes/db.php');

$error = "";
$success = "";
$token = $_GET['token'] ?? '';

if (empty($token)) {
    die("Invalid or missing token.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (empty($password) || empty($confirm)) {
        $error = "Please fill in all fields.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        // Check token and expiry
        $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token=? AND reset_expires > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            // Update password and remove token
            $stmt2 = $conn->prepare("UPDATE users SET password_hash=?, reset_token=NULL, reset_expires=NULL WHERE id=?");
            $stmt2->bind_param("si", $hashed, $user['id']);
            $stmt2->execute();
            $stmt2->close();

            $success = "Password successfully updated! <a href='login.php'>Login now</a>";
        } else {
            $error = "Invalid or expired token.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Set New Password | Scissors & Scotch</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
<div class="login-container">
    <h2>Set a New Password</h2>

    <?php if($error): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php elseif($success): ?>
        <div class="success-message"><?= $success ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <input type="password" name="password" placeholder="New password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        <button type="submit">Update Password</button>
    </form>
</div>
</body>
</html>
