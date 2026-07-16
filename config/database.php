<?php

// Get database settings from environment variables
$host = getenv("DB_HOST") ?: "localhost";
$username = getenv("DB_USER") ?: "root";
$password = getenv("DB_PASSWORD") ?: "";
$database = getenv("DB_NAME") ?: "smart_online_shop";
$port = getenv("DB_PORT") ?: 3306;

$conn = mysqli_init();

if (!$conn) {
    die("MySQL initialization failed");
}

/*
 Check if running with TiDB Cloud SSL
 or normal local MySQL/Docker
*/

if (getenv("DB_SSL") === "true") {

    mysqli_ssl_set(
        $conn,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL
    );

    $ssl = MYSQLI_CLIENT_SSL;

} else {

    $ssl = 0;
}


// Connect to database
mysqli_real_connect(
    $conn,
    $host,
    $username,
    $password,
    $database,
    $port,
    NULL,
    $ssl
);


// Check connection
if (mysqli_connect_errno()) {

    die(
        "Database connection failed: " .
        mysqli_connect_error()
    );

}


// Set character encoding
mysqli_set_charset($conn, "utf8mb4");

?>