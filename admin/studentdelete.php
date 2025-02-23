<?php
include('../includes/config.php'); // Include your database configuration

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch the file path to delete the uploaded file
    $sql = "SELECT file_upload FROM students WHERE id = $student_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $file_upload = $row['file_upload'];

    // Delete the student record
    $sql = "DELETE FROM students WHERE id = $student_id";
    if (mysqli_query($conn, $sql)) {
        // Delete the uploaded file if it exists
        if ($file_upload && file_exists("../uploads/" . $file_upload)) {
            unlink("../uploads/" . $file_upload);
        }
        echo "<script>alert('Student deleted successfully.'); window.location.href='studentsdisplay.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='studentsdisplay.php';</script>";
}
?>