<?php
session_start();

include "config/database.php";

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];

    $query = "SELECT * FROM products WHERE product_id = $product_id";

    $result = mysqli_query($conn, $query);

    $product = mysqli_fetch_assoc($result);

    if ($product) {

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$product_id])) {

            $_SESSION['cart'][$product_id]['quantity']++;

        } else {

            $_SESSION['cart'][$product_id] = [
                'name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
}

header("Location: cart.php");
exit;
?>