<?php

session_start();

include "config/database.php";

include "includes/header.php";
include "includes/Navbar.php";



$product = null;



if(isset($_GET['id'])){


    $id = (int)$_GET['id'];



    $query = "SELECT products.*, categories.category_name
              FROM products
              JOIN categories
              ON products.category_id = categories.category_id
              WHERE products.product_id=$id";



    $result = mysqli_query($conn,$query);



    if(mysqli_num_rows($result)>0){

        $product = mysqli_fetch_assoc($result);

    }



}





// Add Review

if(isset($_POST['submit_review'])){


    if(!isset($_SESSION['user_id'])){


        header("Location: login.php");

        exit;


    }



    $user_id = $_SESSION['user_id'];

    $product_id = $_POST['product_id'];

    $rating = $_POST['rating'];

    $comment = $_POST['comment'];



    $review_query = "INSERT INTO reviews(user_id,product_id,rating,comment)
                     VALUES('$user_id','$product_id','$rating','$comment')";



    mysqli_query($conn,$review_query);



    header("Location: product_details.php?id=$product_id");

    exit;



}




?>



<div class="container mt-5">



<?php if($product){ ?>



<div class="row">



<div class="col-md-5">


<img src="assets/images/<?php echo $product['image']; ?>"
class="img-fluid rounded shadow"
style="height:350px;width:100%;object-fit:cover;">


</div>





<div class="col-md-7">


<h2>
<?php echo $product['product_name']; ?>
</h2>



<p class="text-muted">

<?php echo $product['description']; ?>

</p>



<h4>
Category:
<?php echo $product['category_name']; ?>
</h4>



<h3 class="text-success">

<?php echo number_format($product['price']); ?> RWF

</h3>




<a href="add_to_cart.php?id=<?php echo $product['product_id']; ?>"
class="btn btn-primary btn-lg">

🛒 Add To Cart

</a>



</div>



</div>





<hr class="my-5">





<!-- Review Form -->


<h3>
⭐ Write a Review
</h3>



<?php if(isset($_SESSION['user_id'])){ ?>



<form method="POST">



<input type="hidden"
name="product_id"
value="<?php echo $product['product_id']; ?>">



<label>
Rating
</label>



<select name="rating"
class="form-control mb-3"
required>


<option value="5">
⭐⭐⭐⭐⭐
</option>


<option value="4">
⭐⭐⭐⭐
</option>


<option value="3">
⭐⭐⭐
</option>


<option value="2">
⭐⭐
</option>


<option value="1">
⭐
</option>


</select>




<textarea name="comment"
class="form-control mb-3"
placeholder="Write your review..."
required></textarea>




<button class="btn btn-success"
name="submit_review">

Submit Review

</button>



</form>



<?php } else { ?>


<p>
Login to write a review.
</p>



<?php } ?>






<hr class="my-5">





<!-- Display Reviews -->


<h3>
Customer Reviews
</h3>




<?php


$reviews_query = "SELECT reviews.*, users.full_name
                  FROM reviews
                  JOIN users
                  ON reviews.user_id = users.user_id
                  WHERE product_id=".$product['product_id']."
                  ORDER BY review_date DESC";



$reviews_result = mysqli_query($conn,$reviews_query);



if(mysqli_num_rows($reviews_result)>0){



while($review=mysqli_fetch_assoc($reviews_result)){



?>



<div class="card shadow p-3 mb-3">


<h5>
<?php echo $review['full_name']; ?>
</h5>



<p>

<?php

echo str_repeat("⭐",$review['rating']);

?>

</p>




<p>
<?php echo $review['comment']; ?>
</p>



<small>
<?php echo $review['review_date']; ?>
</small>



</div>



<?php } ?>



<?php } else { ?>


<p>
No reviews yet. Be the first to review this product!
</p>



<?php } ?>



<?php } else { ?>


<h3>
Product not found.
</h3>



<?php } ?>



</div>



<?php include "includes/footer.php"; ?>