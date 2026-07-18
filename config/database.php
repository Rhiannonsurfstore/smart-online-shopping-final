<?php

$host = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_NAME");
$port = getenv("DB_PORT");

$conn = mysqli_init();

if (!$conn) {
    die("MySQL initialization failed.");
}

// Enable SSL only when connecting to TiDB Cloud
$flags = 0;

if ($port == 4000) {
    mysqli_ssl_set(
        $conn,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    );

    $flags = MYSQLI_CLIENT_SSL;
}

mysqli_real_connect(
    $conn,
    $host,
    $username,
    $password,
    $database,
    (int)$port,
    NULL,
    $flags
);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

?>