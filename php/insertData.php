<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Step 1: Database connection parameters
    $servername = "localhost"; // Change this if necessary
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "food"; // The database you created

    // Step 2: Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Step 3: Capture form data
    $recipe_name = $conn->real_escape_string($_POST['recipeTitle']) ?? '';
    $recipe_desc = $conn->real_escape_string($_POST['recipeDescription']) ?? '';

    // Step 4: Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 5: Prepare the SQL query to insert data
    $sql = "INSERT INTO recipes (recipe_name, recipe_desc) VALUES ('$recipe_name','$recipe_desc')";

    // Step 6: Execute the query

    if ($conn->query($sql) === TRUE) {
        echo "SUCCESS!";
        echo "<script>document.getElementById('alertMsg').innerHtml = 'Title/Description successfully added!';</script>";
        // echo "New record created successfully";
    } else {
        echo "NOT SUCCESSFUL!";
        echo "<script>document.getElementById('alertMsg').innerHtml = 'Error: ' + $sql + $conn->error;</script>";
        echo "<script>document.getElementById(alertMsg').style.background-color = '#F3917D';</script>";
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Step 7: Close the connection
    $conn->close();
} else {
    echo 'REQUEST_METHOD is ' . $_SERVER['REQUEST_METHOD'] . '<br>';
    echo 'isset($_POST["submit"]) is ' . isset($_POST['submit']) . '<br>';
}
