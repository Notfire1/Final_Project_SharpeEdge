<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<?php include('includes/header.php'); ?>

<section class="appointment py-5">
  <div class="container">
    <h2 class="appointment-title mb-4 fw-bold">Book Your Appointment</h2>
    <p class="text-center mb-5 text-light">Fill out the form below and we'll get back to you to confirm your appointment.</p>

    <div class="appointment-form-container">
      <form action="submit_appointment.php" method="POST" class="appointment-form">

        <!-- Name -->
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" name="name" id="name" required placeholder="John Doe">
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required placeholder="johndoe@example.com">
        </div>

        <!-- Phone -->
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" required placeholder="+1 555 123 4567">
        </div>

        <!-- Service -->
        <div class="form-group">
          <label for="service">Select Service</label>
          <select name="service" id="service" required>
            <option value="">-- Choose a Service --</option>
            <option value="exclusive_hairwash">Exclusive Hairwash</option>
            <option value="beard_trim">Beard Trim</option>
            <option value="hair_coloring">Hair Coloring</option>
            <option value="kids_haircut">Kids Haircut</option>
            <option value="fade_haircut">Fade Haircut</option>
            <option value="scalp_treatment">Scalp Treatment</option>
            <option value="hotTowel_shave">Hot Towel Shave</option>
            <option value="eyebrows">Eyebrow</option>
            <option value="Taper">Taper</option>
          </select>
        </div>

        <!-- Date -->
        <div class="form-group">
          <label for="date">Preferred Date</label>
          <input type="date" name="date" id="date" required>
        </div>

        <!-- Time -->
        <div class="form-group">
          <label for="time">Preferred Time</label>
          <input type="time" name="time" id="time" required>
        </div>

        <!-- Submit -->
        <div class="form-group text-center">
          <button type="submit" class="submit-btn">Book Appointment</button>
        </div>

      </form>
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>
