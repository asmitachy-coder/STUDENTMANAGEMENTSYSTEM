<?php
include('../includes/config.php');
$sql = "SELECT * FROM faculties";
$res = mysqli_query($conn, $sql);
$num = mysqli_num_rows($res);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gurname = $_POST['gurname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pass = $_POST['pass'];
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $faculty_id = $_POST['faculty_id'];
    $file_name = $_FILES['file_upload']['name'];
    $file_tmp_name = $_FILES['file_upload']['tmp_name'];
    $file_size = $_FILES['file_upload']['size'];

    $upload_dir = '../uploads/';
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $file_with_timestamp = "P" . $timestamp . '.' . $file_ext;
    $upload_path = $upload_dir . $file_with_timestamp;

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    if (!in_array(strtolower($file_ext), $allowed_types)) {
        echo "<script>alert('Invalid file type. Only JPG, PNG, GIF, and PDF are allowed.');</script>";
    } else {
        if (move_uploaded_file($file_tmp_name, $upload_path)) {
            $check_email_query = "SELECT * FROM students WHERE email='$email'";
            $check_email_result = mysqli_query($conn, $check_email_query);

            if (mysqli_num_rows($check_email_result) > 0) {
                echo "<script>alert('Email already exists. Please use a different email.');</script>";
            } else {
                $sql = "INSERT INTO students (name, address, faculty_id, city, gurname, email, pass, number, file_upload) 
                        VALUES ('$name', '$address', $faculty_id, '$city', '$gurname', '$email', '$hashed_pass', '$number', '$file_with_timestamp')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Student added successfully.'); window.location.href='../admin/studentdisplay.php';</script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
                }
            }
        } else {
            echo "<script>alert('There was an error uploading the file.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/dashboardstyle.css">
</head>
<body>
    <?php include('../admin/navbar.php'); ?>
    <?php include('../admin/sidebar.php'); ?>

    <main class="main-content">
        <div class="container">
            <h1 class="text-center">Add New Student</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter student name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" placeholder="Enter city" required>
                </div>
                <div class="form-group">
                    <label for="gurname">Guardian Name:</label>
                    <input type="text" id="gurname" name="gurname" placeholder="Enter guardian name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="number">Contact Info:</label>
                    <input type="number" id="number" name="number" placeholder="Enter contact number" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="faculty_id">Faculty:</label>
                    <select id="faculty_id" name="faculty_id" required>
                        <?php
                        if ($num > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['id']}'>{$row['faculty_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_upload">Upload File:</label>
                    <input type="file" id="file_upload" name="file_upload" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn">Add Student</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>