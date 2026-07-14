<?php

session_start();

include "config/database.php";

include "includes/header.php";
include "includes/Navbar.php";


// Check login

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit;

}


$user_id = $_SESSION['user_id'];



// Get user information

$user_query = "SELECT * FROM users WHERE user_id='$user_id'";

$user_result = mysqli_query($conn,$user_query);

$user = mysqli_fetch_assoc($user_result);




// Get orders

$order_query = "SELECT * FROM orders 
                WHERE user_id='$user_id'
                ORDER BY order_date DESC";


$order_result = mysqli_query($conn,$order_query);



?>



<div class="container mt-5">



<h2 class="mb-4">
👤 My Profile
</h2>




<div class="card shadow p-4 mb-5">


<h4>
Customer Information
</h4>


<p>
<strong>Name:</strong>
<?php echo $user['full_name']; ?>
</p>



<p>
<strong>Email:</strong>
<?php echo $user['email']; ?>
</p>



</div>





<h2>
📦 My Orders
</h2>




<table class="table table-bordered table-striped mt-3">



<thead class="table-dark">


<tr>


<th>
Order ID
</th>


<th>
Total Amount
</th>


<th>
Order Date
</th>


<th>
Status
</th>


</tr>


</thead>




<tbody>




<?php if(mysqli_num_rows($order_result) > 0){ ?>



<?php while($order = mysqli_fetch_assoc($order_result)){ ?>


<tr>



<td>

#<?php echo $order['order_id']; ?>

</td>




<td>

<?php echo number_format($order['total_amount']); ?> RWF

</td>





<td>

<?php echo $order['order_date']; ?>

</td>






<td>



<?php


$status = $order['status'];



if($status == "Pending"){


echo '<span class="badge bg-warning text-dark">
Pending
</span>';



}

elseif($status == "Processing"){


echo '<span class="badge bg-primary">
Processing
</span>';



}

elseif($status == "Completed"){


echo '<span class="badge bg-success">
Completed
</span>';



}

elseif($status == "Delivered"){


echo '<span class="badge bg-success">
Delivered
</span>';



}

elseif($status == "Cancelled"){


echo '<span class="badge bg-danger">
Cancelled
</span>';



}

else{


echo '<span class="badge bg-secondary">
Unknown
</span>';


}



?>



</td>




</tr>




<?php } ?>



<?php } else { ?>


<tr>

<td colspan="4" class="text-center">

No orders found.

</td>

</tr>


<?php } ?>




</tbody>


</table>





</div>




<?php include "includes/footer.php"; ?>