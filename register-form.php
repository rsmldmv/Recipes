<?php

require "dbconnection_pdo.php";

// Initialize variables
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $handle = trim($_POST["handle"]);
    $email = trim($_POST["email"]);
    $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // If there are no errors, you can process the data (e.g., save to database)
    if (empty($errors)) {
        $sql = "INSERT INTO food.users (username, password, handle, email) VALUES (:username, :password, :handle, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashed);
        $stmt->bindParam(":handle", $handle);
        $stmt->bindParam(":email", $email);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>document.getElementById('msg').display = 'block';</script>";
            echo "<script>redirectAfterDelay('index.php', 2000);</script>";
        } else {
            echo "<script>alert('There was an error saving your data. Please try again!');</script>";
        }
        // Close the statement
        $pdo = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/register.css" rel="stylesheet">

    <title>Register with The Cookery</title>
</head>

<body>
    <div class="container">
        <div class="row col-12 mt-4 mx-auto py-5" style="z-index: -1;">
            <form id="rForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form form-method pt-4">
                <div style="padding: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                        class="bi bi-person ms-4" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <h3>User Profile</h3>
                </div>

                <label for="username" class="form-label">User Name</label>
                <input type="text" id="username" name="username" class="form-control mx-auto" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control mx-auto" required>

                <label for="handle" class="form-label">Online Handle</label>
                <input type="text" id="handle" name="handle" class="form-control mx-auto" required>

                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control mx-auto" required>

                <input type="submit" class="form-control mx-auto mt-4 border-0 bg-primary">

                <div id="msg" style="width: 100%; text-align: center;">
                    <span>Your profile has been successfully saved!</span>
                    <!-- <span>Your profile has been successfully saved!</span> -->
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/bootstrap.js"></script>
<!-- <script src="./js/index.js"></script> -->

<script>
    // Function to redirect after a specific time
    function redirectAfterDelay(url, delay) {
        setTimeout(function () {
            window.location.href = url;
            window.close();
        }, delay);

    }
</script>

</html>