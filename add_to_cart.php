<?php

session_start();

include "config/database.php";


if(isset($_GET['id'])){


    $product_id = intval($_GET['id']);


    $query = "SELECT * FROM products WHERE product_id = ?";


    $stmt = mysqli_prepare($conn, $query);


    mysqli_stmt_bind_param($stmt, "i", $product_id);


    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);


    $product = mysqli_fetch_assoc($result);



    if($product){


        if(!isset($_SESSION['cart'])){

            $_SESSION['cart'] = [];

        }



        if(isset($_SESSION['cart'][$product_id])){


            $_SESSION['cart'][$product_id]['quantity']++;


        }else{


            $_SESSION['cart'][$product_id] = [

                "name" => $product['product_name'],

                "price" => $product['price'],

                "quantity" => 1

            ];

        }


    }


}


header("Location: cart.php");

exit;

?>