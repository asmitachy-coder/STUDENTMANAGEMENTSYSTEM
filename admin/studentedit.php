<?php
include('../includes/config.php'); // Include your database configuration

// Fetch student data based on ID
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = mysqli_query($conn, $sql);
    $student = mysqli_fetch_assoc($result);

    if (!$student) {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Update student data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gurname = $_POST['gurname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $faculty_id = $_POST['faculty_id'];

    // Handle file upload (if a new file is uploaded)
    if ($_FILES['file_upload']['name']) {
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
            echo "Invalid file type. Only JPG, PNG, GIF, and PDF are allowed.";
        } else {
            if (move_uploaded_file($file_tmp_name, $upload_path)) {
                // Delete the old file if it exists
                if ($student['file_upload'] && file_exists($upload_dir . $student['file_upload'])) {
                    unlink($upload_dir . $student['file_upload']);
                }
                $file_upload = $file_with_timestamp;
            } else {
                echo "There was an error uploading the file.";
                exit();
            }
        }
    } else {
        $file_upload = $student['file_upload']; // Keep the old file
    }

    // Update query
    $sql = "UPDATE students SET 
            name = '$name', 
            address = '$address', 
            city = '$city', 
            gurname = '$gurname', 
            email = '$email', 
            number = '$number', 
            faculty_id = $faculty_id, 
            file_upload = '$file_upload' 
            WHERE id = $student_id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student data updated successfully.'); window.location.href='studentsdisplay.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        label {
            font-weight: 500;
            color: #495057;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br><br>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $student['address']; ?>" required><br><br>
            <label>City:</label>
            <input type="text" name="city" value="<?php echo $student['city']; ?>" required><br><br>
            <label>Guardian Name:</label>
            <input type="text" name="gurname" value="<?php echo $student['gurname']; ?>" required><br><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>
            <label>Contact Info:</label>
            <input type="number" name="number" value="<?php echo $student['number']; ?>" required><br><br>
            <label>Faculty:</label>
            <select name="faculty_id" required>
                <?php
                $sql = "SELECT * FROM faculties";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $selected = ($row['id'] == $student['faculty_id']) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['faculty_name']}</option>";
                }
                ?>
            </select><br><br>
            <label>Upload File:</label>
            <input type="file" name="file_upload"><br><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>