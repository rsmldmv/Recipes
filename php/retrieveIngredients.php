<?php
require 'dbconnection.php';
// Database connection variables
// $servername = "localhost";  // Your server name
// $username = "root";         // Your database username
// $password = "";             // Your database password
// $dbname = "food";           // Your database name
// $ingredient_ID = 0;         // ID of Recipe to be passed into script

// Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// SQL query to retrieve data
$sql = "SELECT id, item_name  FROM ingredients";
$result = mysqli_query($conn, $sql);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Item Name: " . $row["item_name"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
mysqli_close($conn);

