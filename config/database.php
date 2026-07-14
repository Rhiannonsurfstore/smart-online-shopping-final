<?php

$host = "database";
$username = "root";
$password = "root";
$database = "smart_online_shop";

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>