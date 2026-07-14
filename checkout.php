<?php
session_start();


if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit;

}


if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){

    header("Location: cart.php");
    exit;

}


include "includes/header.php";
include "includes/Navbar.php";

?>


<div class="container mt-5">

<h2 class="mb-4">Checkout</h2>


<div class="row">


<div class="col-md-6">


<h4>Customer Information</h4>


<form action="place_order.php" method="POST">


<label class="form-label">
Full Name
</label>

<input type="text" 
name="fullname"
class="form-control mb-3"
required>


<label class="form-label">
Email
</label>

<input type="email"
name="email"
class="form-control mb-3"
required>


<label class="form-label">
Phone Number
</label>

<input type="text"
name="phone"
class="form-control mb-3"
required>


<label class="form-label">
Address
</label>

<textarea name="address"
class="form-control mb-3"
required></textarea>


<button class="btn btn-success">
Place Order
</button>


</form>


</div>




<div class="col-md-6">


<h4>Order Summary</h4>


<div class="card p-3">


<?php

$total = 0;


foreach($_SESSION['cart'] as $item){


$subtotal = $item['price'] * $item['quantity'];

$total += $subtotal;


?>


<p>

<strong>
<?php echo $item['name']; ?>
</strong>

<br>

Quantity:
<?php echo $item['quantity']; ?>


<br>

Price:
<?php echo number_format($subtotal, 2); ?> RWF


</p>


<hr>


<?php } ?>


<h4>

Total:

<?php echo number_format($total, 2); ?> RWF

</h4>


</div>


</div>


</div>


</div>


<?php include "includes/footer.php"; ?>