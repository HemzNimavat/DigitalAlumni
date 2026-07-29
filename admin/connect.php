<?php
// Single place to connect DB
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'alumni_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
}
mysqli_set_charset($conn, 'utf8mb4');
?>
