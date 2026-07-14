<?php

session_start();

include "admin_check.php";

include "../config/database.php";

include "../includes/header.php";
include "../includes/Navbar.php";



if(!isset($_GET['id'])){

    header("Location: orders.php");
    exit;

}



$order_id = (int)$_GET['id'];





// Get order information

$order_query = "SELECT orders.*, users.full_name, users.email

                FROM orders

                JOIN users

                ON orders.user_id = users.user_id

                WHERE orders.order_id='$order_id'";



$order_result = mysqli_query($conn,$order_query);



if(mysqli_num_rows($order_result)==0){

    echo "<div class='container mt-5'>
          <h3>Order not found</h3>
          </div>";

    exit;

}



$order = mysqli_fetch_assoc($order_result);






// Get products

$item_query = "SELECT order_items.*, 
               products.product_name,
               products.price,
               products.image

               FROM order_items

               JOIN products

               ON order_items.product_id = products.product_id

               WHERE order_items.order_id='$order_id'";



$item_result = mysqli_query($conn,$item_query);



?>





<div class="container mt-5">





<h2 class="mb-4">

📦 Order Details #<?php echo $order_id; ?>

</h2>







<div class="card shadow p-4 mb-4">



<h4>
👤 Customer Information
</h4>



<hr>



<p>

<strong>Name:</strong>

<?php echo htmlspecialchars($order['full_name']); ?>

</p>




<p>

<strong>Email:</strong>

<?php echo htmlspecialchars($order['email']); ?>

</p>





<p>

<strong>Status:</strong>

<?php


if($order['status']=="Pending"){

echo "<span class='badge bg-warning text-dark'>
🟡 Pending
</span>";

}

elseif($order['status']=="Processing"){

echo "<span class='badge bg-info'>
🔵 Processing
</span>";

}

elseif($order['status']=="Delivered"){

echo "<span class='badge bg-primary'>
🚚 Delivered
</span>";

}

elseif($order['status']=="Completed"){

echo "<span class='badge bg-success'>
🟢 Completed
</span>";

}

else{

echo "<span class='badge bg-danger'>
🔴 Cancelled
</span>";

}


?>


</p>



</div>








<h4 class="mb-3">

🛍 Products Ordered

</h4>





<div class="table-responsive">



<table class="table table-bordered shadow">



<thead class="table-dark">


<tr>


<th>Image</th>

<th>Product</th>

<th>Quantity</th>

<th>Price</th>

<th>Subtotal</th>


</tr>


</thead>





<tbody>



<?php while($item=mysqli_fetch_assoc($item_result)){ ?>



<tr>



<td>


<img src="../assets/images/<?php echo $item['image']; ?>"
width="70"
height="70"
style="object-fit:cover;"
class="rounded">


</td>






<td>

<?php echo htmlspecialchars($item['product_name']); ?>

</td>





<td>

<?php echo $item['quantity']; ?>

</td>






<td>

<?php echo number_format($item['price']); ?>

RWF

</td>






<td class="text-success fw-bold">


<?php

echo number_format(
$item['price'] * $item['quantity']
);

?>

RWF


</td>





</tr>



<?php } ?>



</tbody>



</table>



</div>







<h3 class="text-success mt-4">

💰 Total:

<?php echo number_format($order['total_amount']); ?>

RWF

</h3>







<a href="orders.php"
class="btn btn-primary mt-3">

← Back To Orders

</a>





</div>







<?php include "../includes/footer.php"; ?>