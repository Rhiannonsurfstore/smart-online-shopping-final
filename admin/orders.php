<?php

session_start();

include "admin_check.php";

include "../config/database.php";

include "../includes/header.php";
include "../includes/Navbar.php";




// Update order status

if(isset($_POST['update_status'])){


    $order_id = $_POST['order_id'];

    $status = $_POST['status'];



    $stmt = mysqli_prepare($conn,
    "UPDATE orders SET status=? WHERE order_id=?");



    mysqli_stmt_bind_param(
        $stmt,
        "si",
        $status,
        $order_id
    );



    mysqli_stmt_execute($stmt);



    header("Location: orders.php");

    exit;


}





// Get orders

$query = "SELECT orders.*, users.full_name, users.email

          FROM orders

          JOIN users

          ON orders.user_id = users.user_id

          ORDER BY order_date DESC";



$result = mysqli_query($conn,$query);



?>





<div class="container mt-5">



<h2 class="mb-4">
🛒 Manage Orders
</h2>






<div class="table-responsive">



<table class="table table-bordered table-hover shadow">



<thead class="table-dark">


<tr>

<th>Order ID</th>

<th>Customer</th>

<th>Email</th>

<th>Amount</th>

<th>Date</th>

<th>Status</th>

<th>Action</th>


</tr>


</thead>






<tbody>




<?php while($order=mysqli_fetch_assoc($result)){ ?>



<tr>



<td>

#<?php echo $order['order_id']; ?>

</td>





<td>

<?php echo htmlspecialchars($order['full_name']); ?>

</td>





<td>

<?php echo htmlspecialchars($order['email']); ?>

</td>






<td class="text-success fw-bold">

<?php echo number_format($order['total_amount']); ?>

RWF

</td>






<td>

<?php

echo date("d M Y",
strtotime($order['order_date']));

?>

</td>








<td>



<?php

$status=$order['status'];



if($status=="Pending"){

echo "<span class='badge bg-warning text-dark'>
🟡 Pending
</span>";

}

elseif($status=="Processing"){

echo "<span class='badge bg-info'>
🔵 Processing
</span>";

}

elseif($status=="Completed"){

echo "<span class='badge bg-success'>
🟢 Completed
</span>";

}

elseif($status=="Delivered"){

echo "<span class='badge bg-primary'>
🚚 Delivered
</span>";

}

else{

echo "<span class='badge bg-danger'>
🔴 Cancelled
</span>";

}

?>



</td>









<td>



<!-- View Order Details -->

<a href="order_details.php?id=<?php echo $order['order_id']; ?>"
class="btn btn-info btn-sm w-100 mb-2">

📦 View Details

</a>






<form method="POST">



<input type="hidden"
name="order_id"
value="<?php echo $order['order_id']; ?>">





<select name="status"
class="form-select mb-2">



<option value="Pending"
<?php if($status=="Pending") echo "selected"; ?>>

Pending

</option>



<option value="Processing"
<?php if($status=="Processing") echo "selected"; ?>>

Processing

</option>



<option value="Completed"
<?php if($status=="Completed") echo "selected"; ?>>

Completed

</option>



<option value="Delivered"
<?php if($status=="Delivered") echo "selected"; ?>>

Delivered

</option>



<option value="Cancelled"
<?php if($status=="Cancelled") echo "selected"; ?>>

Cancelled

</option>



</select>





<button name="update_status"
class="btn btn-success btn-sm w-100">

Update Status

</button>





</form>



</td>






</tr>




<?php } ?>




</tbody>




</table>




</div>





</div>







<?php include "../includes/footer.php"; ?>