<?php

session_start();

include "includes/header.php";
include "includes/Navbar.php";

?>


<div class="container mt-4">


<h2 class="mb-4">

<i class="fas fa-shopping-cart"></i>

Shopping Cart

</h2>



<?php


if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){


$total = 0;



foreach($_SESSION['cart'] as $id=>$item){


?>


<div class="card shadow mb-3">


<div class="card-body">



<h4>

<?php echo htmlspecialchars($item['name']); ?>

</h4>



<p>

Price:

<strong>

<?php echo number_format($item['price'],2); ?> RWF

</strong>

</p>



<p>


<strong>Quantity:</strong>



<a href="update_cart.php?id=<?php echo $id; ?>&action=decrease">

<button class="btn btn-danger btn-sm">

<i class="fas fa-minus"></i>

</button>

</a>




<strong class="mx-3">

<?php echo $item['quantity']; ?>

</strong>




<a href="update_cart.php?id=<?php echo $id; ?>&action=increase">

<button class="btn btn-success btn-sm">

<i class="fas fa-plus"></i>

</button>

</a>



</p>




<p>

Subtotal:

<strong>

<?php echo number_format($item['price']*$item['quantity'],2); ?>

RWF

</strong>


</p>



<a href="remove_from_cart.php?id=<?php echo $id; ?>"
class="btn btn-outline-danger">


<i class="fas fa-trash"></i>

Remove


</a>



</div>


</div>



<?php


$total += $item['price']*$item['quantity'];


}


?>



<div class="alert alert-success">


<h3>


Total:

<?php echo number_format($total,2); ?> RWF


</h3>


</div>




<a href="checkout.php" class="btn btn-primary btn-lg">


<i class="fas fa-credit-card"></i>

Proceed to Checkout


</a>



<?php


}else{


?>


<div class="alert alert-warning">


<i class="fas fa-shopping-cart"></i>

Your cart is empty.


</div>



<?php


}


?>


</div>



<?php include "includes/footer.php"; ?>