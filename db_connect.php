<?php

session_start();

$host = "localhost:3307";
$username = "root";
$password = "";
$dbname = "student_profile";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!-- <head>
    <link rel="icon" type="image/png" href="assets/logo.jpeg">
</head>
 <a href="logout.php" id="logout" title="Log Out">
        <img src="assets/exit_white.svg" alt="exit">
</a> -->