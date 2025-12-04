<?php
session_start();
include('includes/db.php'); // Connects to your database
?>

<?php include('includes/header.php'); ?>

<section class="contact py-5 bg-dark text-light">
  <div class="container text-center">
    <h2 class="text-warning mb-4 fw-bold">Contact Us</h2>

    <!-- Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
      <div class="alert alert-success text-center mb-4">
        Your message has been sent successfully!
      </div>
    <?php elseif (isset($_GET['error'])): ?>
      <div class="alert alert-danger text-center mb-4">
        There was an error sending your message. Please try again.
      </div>
    <?php endif; ?>

    <!-- Contact Form -->
    <form action="send_message.php" method="post" class="mx-auto" style="max-width: 500px;">
      <input type="text" class="form-control mb-3" name="name" placeholder="Your Name" required>
      <input type="email" class="form-control mb-3" name="email" placeholder="Your Email" required>
      <input type="text" class="form-control mb-3" name="subject" placeholder="Subject" required>
      <textarea class="form-control mb-3" name="message" rows="4" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn btn-warning btn-lg fw-bold">Send Message</button>
    </form>
  </div>
</section>

<?php include('includes/footer.php'); ?>
