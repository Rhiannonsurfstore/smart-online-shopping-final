<?php

// Database configuration
// Works for both local XAMPP and Render deployment

$host = getenv("DB_HOST") ?: "localhost";
$username = getenv("DB_USER") ?: "root";
$password = getenv("DB_PASSWORD") ?: "";
$database = getenv("DB_NAME") ?: "smart_online_shop";



// Create database connection

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);



// Check connection

if (!$conn) {

    die("Database connection failed: " . mysqli_connect_error());

}


// Set character encoding

mysqli_set_charset($conn, "utf8mb4");


?>