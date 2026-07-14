<?php

session_start();

include "admin_check.php";

include "../config/database.php";


if(isset($_GET['id'])){

    $id = $_GET['id'];


    $query = "DELETE FROM products WHERE product_id = $id";


    if(mysqli_query($conn, $query)){

        header("Location: products.php");
        exit;

    }else{

        echo "Failed to delete product.";

    }


}else{

    header("Location: products.php");
    exit;

}

?>