<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/login.css" rel="stylesheet">

    <title>The Cookery - Login</title>
</head>

<body class="bg-gray-100">
    <div class="container col-6" style="margin-top: 200px">
        <form id="login-form" method="POST" class="form mx-auto rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" class="bi bi-door-open svg"
                viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 
                    .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z" />
            </svg>
            <h3 class="rounded mx-auto my-4 fs-3">User Login</h3>

            <div class="mx-auto">
                <label for="username" class="mx-4">User Name</label>
                <input type="text" name="username" id="username" class="form-control mx-3" placeholder="User Name"
                    required><br>

                <label for="password" class="mx-4">Password</label>
                <input type="password" name="password" id="password" class="form-control mx-3" placeholder="Password"
                    required><br>
            </div>

            <div id="goBack" class="d-flex justify-content-center gap-5">
                <input type="submit" style="border: 0px solid transparent; width: 40%; color: #fff"
                    class="form-control rounded bg-primary login-button hover:bg-primary-600" />
                <a href="index.php?handle='<?php $_SESSION['handle']; ?>'">Home</a>
            </div>

            <p id="msg" class="rounded my-3 mx-3" style="color: #212020"></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/index.js"></script>

</body>

</html>

<?php
session_start();
require "dbconnection_pdo.php";
session_unset();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Query to find the user
    $sql = "SELECT password, handle FROM food.users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if (!$user) {
    //     echo "User not found";
    //     exit();
    // }

    $hashedpassword = trim($user['password']) ?? null;

    if ($hashedpassword && password_verify($password, $hashedpassword)) {
        $_SESSION['handle'] = $user['handle'];
        // echo "<script>window.close();</script>";
        echo '<script>document.getElementById("msg").innerHTML = "Login Successful!";</script>';
        echo '<script>document.getElementById("msg").style.display = "block";</script>';
        exit;
    } else {
        echo '<script>document.getElementById("msg").innerHTML = "Invalid Login Credentials...try again!"</script>';
        echo '<script>document.getElementById("msg").style.display = "block";</script>';
    }
}
?>