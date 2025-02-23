<?php
include('../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboardstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include('../admin/navbar.php'); ?>
    <?php include('../admin/sidebar.php'); ?>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="overview">Dashboard Overview</h1>
        <div class="cards">
            <div class="card">
                <h3>Total Students</h3>
                <p>250</p>
            </div>
            <div class="card">
                <h3>Active Students</h3>
                <p>200</p>
            </div>
            <div class="card">
                <h3>Attendance Today</h3>
                <p>85%</p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <canvas id="studentChart"></canvas>
        </div>

        <!-- Quick Links -->
        <div class="quick-links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#"><i class="fas fa-user-plus"></i> Add New Student</a></li>
                <li><a href="../../admin/facultyadd.php"><i class="fas fa-chalkboard-teacher"></i> Add New Faculty</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i> View Attendance</a></li>
                <li><a href="#"><i class="fas fa-edit"></i> Update Grades</a></li>
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <?php include('../admin/footer.php'); ?>

    <script src="../assets/js/dashboard_style.js"></script>
</body>
</html>