<?php

include "config/database.php";
include "includes/header.php";
include "includes/Navbar.php";



// Search and Category Filtering


if(isset($_GET['category'])){


    $category = mysqli_real_escape_string($conn, $_GET['category']);



    $query = "SELECT products.*, 
              categories.category_name,
              AVG(reviews.rating) AS average_rating,
              COUNT(reviews.review_id) AS total_reviews

              FROM products

              JOIN categories
              ON products.category_id = categories.category_id

              LEFT JOIN reviews
              ON products.product_id = reviews.product_id

              WHERE products.category_id='$category'

              GROUP BY products.product_id";



}
elseif(isset($_GET['search'])){


    $search = mysqli_real_escape_string($conn,$_GET['search']);



    $query = "SELECT products.*,
              AVG(reviews.rating) AS average_rating,
              COUNT(reviews.review_id) AS total_reviews

              FROM products

              LEFT JOIN reviews
              ON products.product_id = reviews.product_id

              WHERE products.product_name LIKE '%$search%'
              OR products.description LIKE '%$search%'

              GROUP BY products.product_id";



}
else{


    $query = "SELECT products.*,
              AVG(reviews.rating) AS average_rating,
              COUNT(reviews.review_id) AS total_reviews

              FROM products

              LEFT JOIN reviews
              ON products.product_id = reviews.product_id

              GROUP BY products.product_id";


}



$result = mysqli_query($conn,$query);



?>





<div class="container mt-4">



<h2 class="text-center mb-4">
🛍 Our Products
</h2>





<!-- Categories -->

<div class="text-center mb-5">


<a href="products.php"
class="btn btn-dark m-1">

All

</a>



<a href="products.php?category=1"
class="btn btn-primary m-1">

👗 Fashion

</a>




<a href="products.php?category=3"
class="btn btn-success m-1">

🧴 Beauty

</a>




<a href="products.php?category=4"
class="btn btn-warning m-1">

👜 Bags

</a>




<a href="products.php?category=2"
class="btn btn-danger m-1">

👟 Shoes

</a>



</div>








<div class="row">



<?php while($product=mysqli_fetch_assoc($result)){ ?>



<!-- Responsive Product Column -->

<div class="col-lg-4 col-md-6 col-sm-12 mb-4">





<div class="card shadow h-100 rounded-4 product-card">





<img src="assets/images/<?php echo $product['image']; ?>"
class="card-img-top img-fluid rounded-top-4"
style="height:250px; object-fit:cover;"
alt="<?php echo htmlspecialchars($product['product_name']); ?>">







<div class="card-body text-center">





<h5 class="fw-bold">

<?php echo htmlspecialchars($product['product_name']); ?>

</h5>







<!-- Rating -->


<?php if($product['average_rating']){ ?>


<p class="text-warning mb-1">


<?php

echo str_repeat("⭐", round($product['average_rating']));

?>


<small class="text-muted">

(<?php echo number_format($product['average_rating'],1); ?>)

</small>


</p>





<p class="text-muted">

<?php echo $product['total_reviews']; ?> Reviews

</p>





<?php }else{ ?>



<p class="text-muted">

No reviews yet

</p>



<?php } ?>









<p class="text-muted">

<?php echo htmlspecialchars($product['description']); ?>

</p>








<h4 class="text-success fw-bold">

<?php echo number_format($product['price']); ?> RWF

</h4>







<a href="product_details.php?id=<?php echo $product['product_id']; ?>"
class="btn btn-primary w-100">

View Details

</a>






</div>







</div>






</div>






<?php } ?>





</div>






</div>







<?php include "includes/footer.php"; ?>