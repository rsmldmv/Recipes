<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Step 1: Capture form data
    $ingredient = $_POST['txt'] ?? '';

    // Step 2: Database connection parameters
    $servername = "localhost"; // Change this if necessary
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "recipes"; // The database you created

    // Step 3: Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Step 4: Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 5: Prepare the SQL query to insert data
    $sql = "INSERT INTO ingredients_2 (item_name) VALUES ('$ingredient')";

    // Step 6: Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Step 7: Close the connection
    $conn->close();
}

