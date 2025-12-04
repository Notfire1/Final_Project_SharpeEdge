<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(__DIR__ . '/includes/db.php');
session_start();

$error = "";
$full_name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$full_name || !$email || !$password) {
        $error = "All fields are required.";
    } else {
        // Check if email exists first
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $error = "This email is already registered. Please log in.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            // Corrected INSERT query using password_hash
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password_hash, role, created_at) VALUES (?, ?, ?, 'user', NOW())");
            $stmt->bind_param("sss", $full_name, $email, $password_hash);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful! Please log in.'); window.location='login.php';</script>";
                exit();
            } else {
                $error = "Error: Could not register. Please try again.";
            }

            $stmt->close();
        }

        $checkStmt->close();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | Sharp Edge</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

</head>
<body class="register-page">

<div class="register-container">
    <h2>CREATE YOUR ACCOUNT</h2>
    <p class="subtitle">Sign up to get started with Sharp Edge</p>

    <?php if(!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="full_name" placeholder="Full Name" value="<?= htmlspecialchars($full_name) ?>" required>
        <input type="email" name="email" placeholder="Email Address" value="<?= htmlspecialchars($email) ?>" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>
    </form>

    <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
