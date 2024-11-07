<?php

$host = 'localhost';
$port = 3306;
$dbname = 'food';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

    //Create PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Database/Connection Error: " . $e;
}