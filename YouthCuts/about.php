<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<?php
$page_title = "About Us";
include(__DIR__ . '/includes/header.php');
?>

<!-- Hero Section -->
<section class="about" style="background-image: url('images/BaberPic.webp');">
    <div class="about-container">
        <h1 class="hero-title">About Sharpe Edge</h1>
        <p class="hero-subtitle">Learn more about our mission, vision, and the team behind your cuts ✂️</p>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="container">
        <h2>Our Story</h2>
        <p>
            YouthCuts was founded with a simple mission: to provide top-notch grooming services for young people while creating a friendly and professional environment.
            Our experienced team is dedicated to delivering the latest trends in haircuts, styling, and skincare. We value our community and strive to make every visit enjoyable.
        </p>

        <h2>Our Mission</h2>
        <p>
            To empower youth through style and confidence by providing professional grooming services in a welcoming atmosphere.
        </p>

        <h2>Our Vision</h2>
        <p>
            To become the leading youth-focused salon in the region, known for quality, creativity, and exceptional customer experience.
        </p>

        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="images/Juan.webp" alt="Team Member 1">
                <h3>Juan Hernandez</h3>
                <p>Founder & Lead Stylist</p>
            </div>
            <div class="team-member">
                <img src="images/Mike.webp" alt="Team Member 2">
                <h3>Mike Smith</h3>
                <p>Barber</p>
            </div>
            <div class="team-member">
                <img src="images/Alex.webp" alt="Team Member 3">
                <h3>Alex Johnson</h3>
                <p>Stylist</p>
            </div>
        </div>
    </div>
</section>

<?php include(__DIR__ . '/includes/footer.php'); ?>
