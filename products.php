<?php

session_start();

include "config/database.php";
include "includes/header.php";
include "includes/Navbar.php";


// ================= SEARCH AND CATEGORY FILTER =================


if(isset($_GET['category'])){


    $category = $_GET['category'];


    $stmt = mysqli_prepare($conn,

    "SELECT products.*,
            categories.category_name,
            AVG(reviews.rating) AS average_rating,
            COUNT(reviews.review_id) AS total_reviews

     FROM products

     JOIN categories
     ON products.category_id = categories.category_id

     LEFT JOIN reviews
     ON products.product_id = reviews.product_id

     WHERE products.category_id = ?

     GROUP BY products.product_id, categories.category_name"

    );


    mysqli_stmt_bind_param($stmt,"i",$category);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);



}



elseif(isset($_GET['search']) && !empty($_GET['search'])){


    $search = "%" . $_GET['search'] . "%";


    $stmt = mysqli_prepare($conn,


    "SELECT products.*,
            categories.category_name,
            AVG(reviews.rating) AS average_rating,
            COUNT(reviews.review_id) AS total_reviews

     FROM products

     JOIN categories
     ON products.category_id = categories.category_id

     LEFT JOIN reviews
     ON products.product_id = reviews.product_id

     WHERE products.product_name LIKE ?
     OR products.description LIKE ?

     GROUP BY products.product_id, categories.category_name"

    );


    mysqli_stmt_bind_param($stmt,"ss",$search,$search);


    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);



}



else{


    $query =

    "SELECT products.*,
            categories.category_name,
            AVG(reviews.rating) AS average_rating,
            COUNT(reviews.review_id) AS total_reviews

     FROM products

     JOIN categories
     ON products.category_id = categories.category_id

     LEFT JOIN reviews
     ON products.product_id = reviews.product_id

     GROUP BY products.product_id, categories.category_name";


    $result = mysqli_query($conn,$query);


}



?>


<div class="container mt-4">


<h2 class="text-center mb-4">

<i class="fas fa-shopping-bag text-primary"></i>

Our Products

</h2>





<!-- SEARCH BAR -->


<div class="row justify-content-center mb-4">


<div class="col-md-6">


<form action="products.php" method="GET">


<div class="input-group">


<input

type="text"

name="search"

class="form-control"

placeholder="Search products..."

value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"

>


<button class="btn btn-dark">

<i class="fas fa-search"></i>

Search

</button>


</div>


</form>


</div>


</div>





<!-- CATEGORIES -->


<div class="text-center mb-5">


<a href="products.php"
class="btn btn-dark m-1">

<i class="fas fa-th"></i>

All

</a>



<a href="products.php?category=1"
class="btn btn-primary m-1">

<i class="fas fa-shirt"></i>

Fashion

</a>



<a href="products.php?category=3"
class="btn btn-success m-1">

<i class="fas fa-spa"></i>

Beauty

</a>



<a href="products.php?category=4"
class="btn btn-warning m-1">

<i class="fas fa-bag-shopping"></i>

Bags

</a>



<a href="products.php?category=2"
class="btn btn-danger m-1">

<i class="fas fa-shoe-prints"></i>

Shoes

</a>


</div>






<div class="row">



<?php


if(mysqli_num_rows($result)==0){


?>


<div class="col-12">


<div class="alert alert-warning text-center">


No products found.


</div>


</div>



<?php


}else{


while($product=mysqli_fetch_assoc($result)){


?>



<div class="col-lg-4 col-md-6 col-sm-12 mb-4">


<div class="card shadow h-100 rounded-4 product-card">





<img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>"

class="card-img-top img-fluid rounded-top-4"

style="height:250px;object-fit:cover;"

alt="<?php echo htmlspecialchars($product['product_name']); ?>"

>






<div class="card-body text-center">





<h5 class="fw-bold">

<?php echo htmlspecialchars($product['product_name']); ?>

</h5>







<!-- Rating -->


<?php if($product['average_rating']){ ?>


<p class="text-warning">


<?php

$stars = round($product['average_rating']);

for($i = 1; $i <= $stars; $i++){

    echo '<i class="fas fa-star"></i>';

}

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

<i class="fas fa-eye"></i>

View Details

</a>






</div>



</div>


</div>





<?php


}


}


?>



</div>


</div>





<?php include "includes/footer.php"; ?>