<?php

session_start();

include "admin_check.php";

include "../config/database.php";

include "../includes/header.php";
include "../includes/Navbar.php";


// Total Products

$product_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM products");

$product = mysqli_fetch_assoc($product_query);




// Total Users

$user_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM users");

$user = mysqli_fetch_assoc($user_query);




// Total Orders

$order_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM orders");

$order = mysqli_fetch_assoc($order_query);




// Total Sales

$sales_query = mysqli_query($conn,
"SELECT SUM(total_amount) AS total FROM orders");

$sales = mysqli_fetch_assoc($sales_query);





// Order Status Count


$status_query = mysqli_query($conn,
"SELECT status, COUNT(*) AS total 
 FROM orders 
 GROUP BY status");



$status_name = [];

$status_count = [];



while($row=mysqli_fetch_assoc($status_query)){


    $status_name[] = $row['status'];

    $status_count[] = $row['total'];

}


?>




<div class="container mt-5">



<h2 class="mb-4">
📊 Admin Dashboard
</h2>





<div class="row">





<div class="col-md-3 mb-4">

<div class="card shadow text-center p-4 bg-primary text-white">

<h5>
📦 Products
</h5>

<h1>
<?php echo $product['total']; ?>
</h1>


</div>

</div>






<div class="col-md-3 mb-4">

<div class="card shadow text-center p-4 bg-success text-white">


<h5>
👥 Users
</h5>


<h1>
<?php echo $user['total']; ?>
</h1>


</div>

</div>






<div class="col-md-3 mb-4">

<div class="card shadow text-center p-4 bg-warning">


<h5>
🛒 Orders
</h5>


<h1>
<?php echo $order['total']; ?>
</h1>


</div>

</div>






<div class="col-md-3 mb-4">

<div class="card shadow text-center p-4 bg-danger text-white">


<h5>
💰 Sales
</h5>


<h4>
<?php echo number_format($sales['total'] ?? 0); ?>
RWF
</h4>


</div>

</div>





</div>





<hr>




<h3 class="mt-4">
Order Status Report
</h3>




<div style="width:400px;">


<canvas id="orderChart"></canvas>


</div>







<hr class="my-4">




<a href="products.php"
class="btn btn-primary me-2">

Manage Products

</a>




<a href="add_product.php"
class="btn btn-success me-2">

Add Product

</a>




<a href="orders.php"
class="btn btn-warning">

View Orders

</a>






</div>







<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


const ctx = document.getElementById('orderChart');



new Chart(ctx, {


type: 'pie',


data: {


labels: <?php echo json_encode($status_name); ?>,


datasets: [{


label: 'Orders',


data: <?php echo json_encode($status_count); ?>


}]


}



});



</script>






<?php include "../includes/footer.php"; ?>