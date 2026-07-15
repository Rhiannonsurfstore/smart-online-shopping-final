<?php

$host = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_NAME");
$port = getenv("DB_PORT");


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