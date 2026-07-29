<?php
include 'AdminHeader.php';
include '../config.php';
session_start();

// Fetch feedback from database
$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 20px;
        }
        h2 {
            padding-top: 90px;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #e6ffe6;
        }
    </style>
</head>
<body>

    <h2>All User Feedback</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['fname']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['feedback']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No feedback available</td></tr>";
        }
        ?>
    </table>

</body>
</html>
