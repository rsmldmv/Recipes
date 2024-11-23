<?php
// Database connection variables

$servername = "localhost";  // Your server name
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "food";           // Your database name
$ingredient_ID = 0;         // ID of Recipe to be passed into script

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}