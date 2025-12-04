
<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('includes/header.php'); ?>

<script src="Js/java.js"></script>
<section class="services py-5">
  <div class="container">
    <h2 class="text-center text-warning mb-5 fw-bold">Our Services</h2>
    <p class="text-center mb-5 text-light">From sharp fades to luxury shaves — we bring the perfect blend of tradition and style to every chair.</p>

    <!-- GRID CONTAINER -->
    <div class="services-grid">

      <!-- Service 1 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Hair-Wash.webp" alt="Exclusive Hair Wash" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Exclusive Hair Wash</h4>
          <p>Feel clean with the best hair wash around.</p>
          <p class="price"><strong>$35</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Hot-towel.webp" alt="Hot Towel Shave" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Hot Towel Shave</h4>
          <p>Experience the classic straight-razor shave with soothing steam and essential oils.</p>
          <p class="price"><strong>$35</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Beard-Trim.webp" alt="Beard Trim" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Beard Trim</h4>
          <p>Keep your beard sharp and stylish with our expert grooming specialists.</p>
          <p class="price"><strong>$15</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 4 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Taper.webp" alt="Taper" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Taper</h4>
          <p>Get the latest haircut and look good!</p>
          <p class="price"><strong>$20</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 5 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Hair-Colouring.webp" alt="Hair Coloring" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Hair Coloring</h4>
          <p>Professional color, highlights, and tone matching to fit your look perfectly.</p>
          <p class="price"><strong>$35</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 6 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Kids-Haricut.webp" alt="Kids Haircut" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Kids Haircut</h4>
          <p>Fun, quick, and stylish cuts for the young gentlemen — handled with care.</p>
          <p class="price"><strong>$18</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 7 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Fade-Haircut.webp" alt="Fade Haircut" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Fade Haircut</h4>
          <p>Clean and modern fades tailored to your style.</p>
          <p class="price"><strong>$30</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

      <!-- Service 8 -->
      <div class="service-card">
        <div class="service-img-box">
          <img src="images/Scalp-treatment11.webp" alt="Scalp Treatment" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Scalp Treatment</h4>
          <p>Revitalize your scalp with a deep cleansing treatment.</p>
          <p class="price"><strong>$25</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

       <div class="service-card">
        <div class="service-img-box">
          <img src="images/Eyebrow.webp" alt="Eyebrows" class="service-img">
        </div>
        <div class="service-content">
          <h4 class="text-warning">Eyebrows</h4>
          <p>Make your eyebrows pop with this option.</p>
          <p class="price"><strong>$10</strong></p>
          <a href="Appointment.php" class="book-btn">Book Now</a>
        </div>
      </div>

    </div> <!-- END services-grid -->
  </div>
</section>

<?php include('includes/footer.php'); ?>

