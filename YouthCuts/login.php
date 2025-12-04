<?php
session_start();
include('includes/db.php'); // Connects to your database

$error = "";
$email = "";

// If already logged in, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        $stmt = $conn->prepare("SELECT id, email, password_hash, full_name FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['full_name'] = $user['full_name'];
                header("Location: welcome.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Scissors & Scotch</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
<div class="login-container">
    <h2>WELCOME TO SHARP EDGE</h2>
    <p class="subtitle">Sign in below or <a href="register.php">create an account</a> to get started</p>

    <?php if(!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input type="email" name="email" placeholder="Email address" value="<?= htmlspecialchars($email) ?>" class="<?= (!empty($error)) ? 'error' : '' ?>" required>
    <input type="password" name="password" placeholder="Password" class="<?= (!empty($error)) ? 'error' : '' ?>" required>

    <!-- Forgot Password link -->
    <a href="resetPassword.php" class="forgot">Forgot Password?</a>

    <button type="submit">Let's go</button>
</form>

    <p class="signup">Want to sign up? <a href="register.php">Create an account</a></p>
</div>
</body>
</html>
