<?php
include "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link rel="stylesheet" href="../assets/css/dashboardstyle.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            position: relative;
           

            padding: 20px;
        }
        .container {
            background-color: #2c3e50;
            padding: px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
           
           
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #e9ecef;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f8f9fa;
        }
        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
    

    
</head>
<body>
<?php
include('../admin/navbar.php');
?>
<?php

    include('../admin/sidebar.php');
?>
 <main class="main-content">
    <div class="container ">
        <h1 class="text-center ">Students Display</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Profile Image</th>
                        <th>Faculty</th>
                        <th>City</th>
                        <th>Guardian Name</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['number']}</td>
                                <td>{$row['address']}</td>
                                <td><img src='../uploads/{$row['file_upload']}' width='100' height='100'></td>
                                <td>{$row['faculty_id']}</td>
                                <td>{$row['city']}</td>
                                <td>{$row['gurname']}</td>
                                <td>{$row['pass']}</td>
                                <td>
                                    <a href='studentedit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                                    <a href='studentdelete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11' class='text-center'>No students found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
    <?php
    include('../admin/footer.php');
    ?>
</body>
</html>