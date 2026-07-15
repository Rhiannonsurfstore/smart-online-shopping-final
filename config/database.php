<?php

$host = getenv("DB_HOST") ?: "localhost";
$username = getenv("DB_USER") ?: "root";
$password = getenv("DB_PASSWORD") ?: "root";
$database = getenv("DB_NAME") ?: "smart_online_shop";
$port = getenv("DB_PORT") ?: 3306;


$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database,
    $port
);


if (!$conn) {

    die("Database connection failed: " . mysqli_connect_error());

}

?>