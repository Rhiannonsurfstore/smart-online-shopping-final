<?php

include "config/database.php";
include "includes/header.php";
include "includes/Navbar.php";

?>



<!-- ================= HERO SECTION ================= -->


<div class="container-fluid p-0">


<div class="position-relative">


<img src="assets/images/banner.jpg"
class="img-fluid w-100"
style="height:320px; object-fit:cover;">



<!-- Overlay -->

<div class="position-absolute top-0 start-0 w-100 h-100"
style="background:rgba(0,0,0,0.45);">

</div>




<!-- Hero Content -->

<div class="position-absolute top-50 start-50 translate-middle text-center text-white w-75">


<h1 class="display-5 fw-bold">

Smart Online Shopping

</h1>


<p class="fs-5 mb-2">

Fashion • Beauty • Bags • Shoes

</p>


<p class="mb-3">

Quality products at affordable prices

</p>



<a href="products.php"
class="btn btn-warning px-4">

Shop Now

</a>



</div>



</div>


</div>






<!-- ================= WELCOME SECTION ================= -->


<div class="container mt-3">


<h2 class="text-center mb-2">

Welcome To Our Store

</h2>


<p class="text-center text-muted">

Discover fashion, beauty products, bags and shoes.
Quality products directly to you.

</p>


</div>







<!-- ================= CATEGORIES ================= -->


<div class="container mt-3">


<h2 class="text-center mb-3">

Our Categories

</h2>




<div class="row text-center">





<div class="col-lg-3 col-md-6 mb-3">

<div class="card shadow p-2 h-100 product-card">


<h2>👗</h2>

<h6>
Fashion
</h6>

<p class="text-muted small mb-0">

Latest styles

</p>


</div>

</div>







<div class="col-lg-3 col-md-6 mb-3">

<div class="card shadow p-2 h-100 product-card">


<h2>🧴</h2>

<h6>
Beauty
</h6>


<p class="text-muted small mb-0">

Beauty products

</p>


</div>

</div>







<div class="col-lg-3 col-md-6 mb-3">

<div class="card shadow p-2 h-100 product-card">


<h2>👜</h2>

<h6>
Bags
</h6>


<p class="text-muted small mb-0">

Stylish bags

</p>


</div>

</div>







<div class="col-lg-3 col-md-6 mb-3">

<div class="card shadow p-2 h-100 product-card">


<h2>👟</h2>

<h6>
Shoes
</h6>


<p class="text-muted small mb-0">

Comfortable shoes

</p>


</div>

</div>





</div>


</div>








<!-- ================= FEATURED PRODUCTS ================= -->


<div class="container mt-3">



<h2 class="text-center mb-3">

Featured Products

</h2>




<div class="row">



<?php


$query = "SELECT * FROM products LIMIT 3";

$result = mysqli_query($conn,$query);



while($product=mysqli_fetch_assoc($result)){


?>



<div class="col-lg-4 col-md-6 mb-3">



<div class="card shadow h-100 product-card">





<img src="assets/images/<?php echo $product['image']; ?>"
class="card-img-top"
style="height:150px;object-fit:cover;">





<div class="card-body text-center p-2">



<h6 class="fw-bold">

<?php echo htmlspecialchars($product['product_name']); ?>

</h6>




<p class="text-success fw-bold mb-2">

<?php echo number_format($product['price']); ?> RWF

</p>




<a href="product_details.php?id=<?php echo $product['product_id']; ?>"
class="btn btn-dark btn-sm rounded-pill px-3">

View Product

</a>



</div>


</div>


</div>




<?php } ?>


</div>


</div>







<!-- ================= WHY CHOOSE US ================= -->


<div class="container mt-3 mb-3">


<h2 class="text-center mb-3">

Why Choose Us?

</h2>



<div class="row text-center">



<div class="col-md-4">

<h6>
🚚 Fast Delivery
</h6>

</div>



<div class="col-md-4">

<h6>
🔒 Secure Shopping
</h6>

</div>



<div class="col-md-4">

<h6>
⭐ Quality Products
</h6>

</div>



</div>


</div>







<?php

include "includes/footer.php";

?>