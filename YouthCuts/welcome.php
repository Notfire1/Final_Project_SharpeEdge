<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}



$page_title = "Welcome";
include('includes/header.php');
?>
<section class="welcome-section">
  <div class="container text-center">
    <h1 class="welcome-title">Welcome back, <?= htmlspecialchars($_SESSION['full_name']); ?> 👋</h1>
    <p class="welcome-message">We’re glad to see you again at <strong>Sharp Edge</strong>.</p>
    <a href="dashboard.php" class="btn">Go to Dashboard Now</a>
  </div>
</section>
<?php include('includes/footer.php'); ?>
