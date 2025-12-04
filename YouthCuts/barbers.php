<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="barber-hero" style="background-image: url('images/barber-new.jpg');">
  <div class="container">
    <div class="hero-box">
      <h1 class="hero-title">Meet Our Barbers</h1>
      <p class="hero-subtitle">Our talented team is here to give you the perfect cut, shave, and style.</p>
      <a href="Appointment.php" class="cta btn btn-warning btn-lg fw-bold mt-3">Book Now</a>
    </div>
  </div>
</section>

<!-- Barbers Section -->
<section class="barbers-section py-5">
  <div class="container">
    <h2 class="text-center text-warning fw-bold mb-5">Our Team</h2>
    <div class="row g-4 justify-content-center">
      <!-- Barber 1 -->
      <div class="col-md-4 text-center barber-card">
        <img src="images/Juan.webp" alt="Barber Juan" class="barber-img shadow-lg">
        <h4 class="text-warning fw-bold mt-3">Juan Hernandez</h4>
        <p>Master Barber with over 15 years of experience, specializing in precision cuts, classic styles, and personalized grooming advice. Juan’s attention to detail ensures every client leaves looking sharp and confident.</p>
      </div>
      <!-- Barber 2 -->
      <div class="col-md-4 text-center barber-card">
        <img src="images/Mike.webp" alt="Barber Mike" class="barber-img shadow-lg">
        <h4 class="text-warning fw-bold mt-3">Mike Smith</h4>
        <p>Luxury Shaves & Modern Fades Specialist with a passion for clean lines and contemporary styles. Mike is known for creating smooth, comfortable shaves and modern haircuts tailored to your personality.</p>
      </div>
      <!-- Barber 3 -->
      <div class="col-md-4 text-center barber-card">
        <img src="images/Alex.webp" alt="Barber Alex" class="barber-img shadow-lg">
        <h4 class="text-warning fw-bold mt-3">Alex Johnson</h4>
        <p>Creative Styles & Grooming Expert focused on innovative haircuts, stylish fades, and grooming trends. Alex enjoys transforming client ideas into professional, stylish results while providing expert advice on maintenance.</p>
      </div>
    </div>
  </div>
</section>


<?php include('includes/footer.php'); ?>
