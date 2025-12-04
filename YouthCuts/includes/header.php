<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) : "YourBrand" ?></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <!-- SITE HEADER -->
  <header class="site-header">
    <div class="container header-flex">
      <a href="index.php" class="brand">Sharp Edge</a>

      <nav class="main-nav">
        <a href="index.php">Home</a>
        <a href="services.php">Services</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="barbers.php">Our Barbers</a>
        <a href="about.php">About Us</a>
        <a href="Appointment.php">Appointment</a>
        <a href="contact.php">Contact</a>
<?php if (isset($_SESSION['user_id'])): ?>
          <a href="logout.php" class="logout-link">Logout</a>
        <?php else: ?>
          <a href="login.php" class="login-link">Login</a>
        <?php endif; ?>
      
      </nav>

      <a href="Appointment.php" class="cta">Book Now</a>
    </div>
  </header>

  <main>
