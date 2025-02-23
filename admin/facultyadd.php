<?php
include('../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Faculty</title>
    <link rel="stylesheet" href="../assets/css/dashboardstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .text-center {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }
        .form-group input[type="text"]:focus {
            border-color: #333;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #555;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            .text-center {
                font-size: 20px;
            }
            .form-group input[type="text"] {
                padding: 8px;
            }
            .btn {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Add New Faculty</h1>
        <form action="" method="POST">
            <?php
            if(isset($_POST['submit'])){
                $faculty_name = $_POST['faculty_name'];
                $sql = "INSERT INTO faculties(faculty_name) VALUES('$faculty_name')";
                $res = mysqli_query($conn, $sql);
                if($res){
                    header('Location: ./facultydisplay.php');
                } else {
                    echo "<p style='color: red;'>Failed to Add Faculty</p>";
                }
            }
            ?>
            <div class="form-group">
                <label for="faculty_name">Faculty Name</label>
                <input type="text" name="faculty_name" id="faculty_name" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn">Add Faculty</button>
        </form>
    </div>
</body>
</html>