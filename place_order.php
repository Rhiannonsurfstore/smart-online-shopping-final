<?php

session_start();

include "config/database.php";


// Check login

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit;

}



// Check cart

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){

    header("Location: cart.php");
    exit;

}



// Get logged in user

$user_id = $_SESSION['user_id'];




// Calculate total

$total = 0;


foreach($_SESSION['cart'] as $item){

    $total += $item['price'] * $item['quantity'];

}



// Insert order with user_id and status

$query = "INSERT INTO orders(user_id, total_amount, status)
          VALUES('$user_id','$total','Pending')";



$result = mysqli_query($conn, $query);



if($result){


    $order_id = mysqli_insert_id($conn);



    // Insert order items

    foreach($_SESSION['cart'] as $product_id => $item){


        $quantity = $item['quantity'];



        $query2 = "INSERT INTO order_items(order_id, product_id, quantity)
                   VALUES('$order_id','$product_id','$quantity')";



        mysqli_query($conn,$query2);



    }



    // Clear cart

    unset($_SESSION['cart']);



    header("Location: order_success.php");

    exit;


}

else{


    echo "Order failed: " . mysqli_error($conn);


}

?>