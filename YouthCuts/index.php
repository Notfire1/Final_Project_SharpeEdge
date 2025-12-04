
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$page_title = "Home - YourBrand Grooming Lounge";
include('includes/header.php');
?>

<!-- HERO SECTION -->
<section class="hero" style="background-image: url('images/backGround.jpg');">
  <div class="container">
    <h1 class="hero-title">Look Sharp. Feel Sharp.</h1>
    <p class="hero-subtitle">Modern grooming for the modern gentleman — haircuts, shaves, and style in one place.</p>
    <a href="services.php" class="cta">Explore Our Services</a>
  </div>
</section>

<!-- ABOUT SECTION -->
 
<section class="about">
  <div class="index-container">
     <style>
      
      .about h2 {
    color: #000000ff;
   
                }
   .index-container{
    color: #000000ff;
   }
    </style>
    <h2>Welcome to Sharp Edge</h2>
    <p>
      At Sharp Edge, we combine classic barbering traditions with modern techniques.
      Whether you’re preparing for a meeting or a night out, our expert stylists make sure you leave looking and feeling your best.
    </p>
  </div>
</section>

<!-- SERVICES PREVIEW -->
<section class="services">
  <div class="container">
    <h2>Our Signature Services</h2>
    <div class="service-grid">
      <div class="card">
        <img src="images/Hair-Wash.webp" alt="Hair Wash">
        <h3>Exclusive Hair Wash</h3>
        <p>Feel clean with the best hair wash around.</p>
      </div>
      <div class="card">
        <img src="images/Hot-towel.webp" alt="Hot Towel Shave">
        <h3>Hot Towel Shave</h3>
        <p>Experience the classic straight-razor shave with soothing steam and essential oils.</p>
      </div>
      <div class="card">
        <img src="images/Beard-Trim.webp" alt="Beard Trim">
        <h3>Beard Trim</h3>
        <p>Keep your beard sharp and stylish with our expert grooming specialists.</p>
      </div>
    </div>
    <div class="center-btn">
      <a href="services.php" class="cta">View All Services</a>
    </div>
  </div>
</section>


<!-- GALLERY -->
<section class="gallery">
  <div class="container">
    <h2>Inside the Lounge</h2>
    <div class="gallery-grid">
      <img src="images/Lounge.webp" alt="Lounge Interior">
      <img src="images/Bar.webp" alt="Bar Area">
      <img src="images/Hairtcut-Lounge.webp" alt="Haircut in Progress">
      <img src="images/Tools.webp" alt="Tools of the Trade">
    </div>
  </div>
</section>

<!-- CONTACT CTA -->
<section class="contact-cta">
  <div class="container">
    <h2>Ready for Your Next Cut?</h2>
    <p>Book your appointment today or contact us for more information.</p>
    <a href="contact.php" class="cta">Contact Us</a>
  </div>
</section>

<?php include('includes/footer.php'); ?>
