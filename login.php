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

    if (!$user) {
        echo "User not found!";
        exit();
    } else {
        $hashedpassword = trim($user['password']) ?? null;

        if ($hashedpassword && password_verify($password, $hashedpassword)) {
            $_SESSION['handle'] = $user['handle'];
            echo "<script>window.close();</script>";
            // echo '<script>document.getElementById("msg").innerHTML = "Login Successful!";</script>';
            // echo '<script>document.getElementById("msg").style.display = "block";</script>';
            // exit();
        } else {
            echo '<script>document.getElementById("msg").innerHTML = "Invalid Login Credentials...try again!"</script>';
            echo '<script>document.getElementById("msg").style.display = "block";</script>';
        }
    }
}