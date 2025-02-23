<?php
session_start();
include('../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .navbar-nav li {
            position: relative;
        }

        .navbar-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #3498db;
        }

        .navbar-nav a i {
            font-size: 1.2rem;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #34495e;
            border-radius: 5px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            list-style: none;
            padding: 0.5rem 0;
            min-width: 150px;
        }

        .dropdown-menu li {
            margin: 0;
        }

        .dropdown-menu a {
            padding: 0.5rem 1rem;
            color: white;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-nav li:hover .dropdown-menu {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .navbar-nav {
                gap: 1rem;
            }

            .navbar-nav a {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Student Management System</div>
        <ul class="navbar-nav">
            <li>
                <a href="#"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-users"></i> Students</a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fas fa-list"></i> View Students</a></li>
                    <li><a href="#"><i class="fas fa-user-plus"></i> Add Student</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-chalkboard-teacher"></i> Faculty</a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fas fa-list"></i> View Faculty</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i> Add Faculty</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fas fa-calendar-alt"></i> Attendance</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="./admin/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>
</body>
</html>