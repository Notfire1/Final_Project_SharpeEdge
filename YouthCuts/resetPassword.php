<?php
session_start();
include('includes/db.php'); // Database connection

$message = "";
$error = "";

// Step 1: Form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $error = "Please enter your email.";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $userId = $user['id'];

            // Generate a temporary token
            $token = bin2hex(random_bytes(32));
          $expires = date("Y-m-d H:i:s", strtotime("+2 minutes")); // 2-minute expiry

            // Store token in database
            $stmt2 = $conn->prepare("UPDATE users SET reset_token=?, reset_expires=? WHERE id=?");
            $stmt2->bind_param("ssi", $token, $expires, $userId);
            $stmt2->execute();
            $stmt2->close();

            // Normally you would send an email. For local dev, show the link
            $resetLink = "http://localhost/YouthCuts/newpassword.php?token=$token";
           $message = "Password reset link:<br><div class='reset-link-wrapper'><a href='$resetLink'>$resetLink</a></div><br>(valid for 1 hour)";

        } else {
            $error = "No account found with that email.";
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
<title>Reset Password | Scissors & Scotch</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
<div class="login-container">
    <h2>Reset Your Password</h2>

    <?php if(!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php elseif(!empty($message)): ?>
        <div class="success-message"><?= $message ?></div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>

    <p><a href="login.php">Back to login</a></p>
</div>
</body>
</html>
