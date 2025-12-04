<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include(__DIR__ . '/includes/db.php');


$user_id = $_SESSION['user_id'];

// Fetch user info
$stmt = $conn->prepare("SELECT full_name, email, role, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch last 5 appointments for this user
$appt_stmt = $conn->prepare("SELECT service, appointment_date, status FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC LIMIT 5");
$appt_stmt->bind_param("i", $user_id);
$appt_stmt->execute();
$appt_result = $appt_stmt->get_result();

$page_title = "Dashboard";
include(__DIR__ . '/includes/header.php');
?>

<div class="dashboard-container">
     <style>
        body {
            background-color: #2b2b2bff;
           
        }
        h1 {
            margin-top: 0; /* Remove top margin for the heading */
        }
        .dashboard-container {
            max-width: 800px; /* Control width for better readability */
            margin: auto; /* Center the container */
            padding: 20px; /* Padding around the container */
            background: white; /* Background for better contrast */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
    <h1>Welcome back, <?= htmlspecialchars($user['full_name']); ?> 👋</h1>

    <!-- Quick Actions -->
    <section class="quick-actions">
        <h2>Dashboard</h2>
        <section class="quick-actions">
    <div class="quick-actions-cards">
        <a href="Appointment.php" class="action-card">
            <span class="icon">📅</span>
            <span class="text">Book Appointment</span>
        </a>
        <a href="barbers.php" class="action-card">
            <span class="icon">💇‍♂️</span>
            <span class="text">Check out our Barbers!</span>
        </a>
        <a href="services.php" class="action-card">
            <span class="icon">💈</span>
            <span class="text">View Services</span>
        </a>
        <a href="logout.php" class="action-card">
            <span class="icon">🚪</span>
            <span class="text">Logout</span>
        </a>
    </div>
</section>
    </section>

    <!-- User Info -->
    <section class="user-info">
        <h2>Your Info</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($user['full_name']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
        <p><strong>Member Since:</strong> <?= date("F j, Y", strtotime($user['created_at'])); ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role']); ?></p>
    </section>

    <!-- Recent Appointments -->
    <section class="recent-appointments">
        <h2>Recent Appointments</h2>
        <?php if ($appt_result->num_rows > 0): ?>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($appt = $appt_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($appt['service']); ?></td>
                            <td><?= date("F j, Y, g:i A", strtotime($appt['appointment_date'])); ?></td>
                            <td><?= htmlspecialchars(ucfirst($appt['status'])); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No recent appointments found.</p>
        <?php endif; ?>
    </section>
</div>

<?php
$appt_stmt->close();
include(__DIR__ . '/includes/footer.php');
?>
