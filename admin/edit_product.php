<?php
session_start();
include "admin_check.php";

include "../config/database.php";

include "../includes/header.php";
include "../includes/Navbar.php";


if(!isset($_GET['id'])){

    header("Location: products.php");
    exit;

}


$id = $_GET['id'];


// Get product information

$query = "SELECT * FROM products WHERE product_id = $id";

$result = mysqli_query($conn, $query);

$product = mysqli_fetch_assoc($result);



if(!$product){

    echo "Product not found";
    exit;

}



// Get categories

$categories = mysqli_query($conn, "SELECT * FROM categories");




// Update product

if(isset($_POST['update_product'])){


    $product_name = $_POST['product_name'];

    $description = $_POST['description'];

    $price = $_POST['price'];

    $image = $_POST['image'];

    $category_id = $_POST['category_id'];



    $update = "UPDATE products SET

    product_name='$product_name',

    description='$description',

    price='$price',

    image='$image',

    category_id='$category_id'


    WHERE product_id=$id";



    if(mysqli_query($conn, $update)){


        header("Location: products.php");

        exit;


    }else{


        echo "Update failed";


    }


}


?>



<div class="container mt-5">


<h2>Edit Product</h2>



<form method="POST">



<div class="mb-3">

<label class="form-label">
Product Name
</label>


<input type="text"
name="product_name"
class="form-control"
value="<?php echo $product['product_name']; ?>"
required>

</div>




<div class="mb-3">

<label class="form-label">
Description
</label>


<textarea name="description"
class="form-control"
required><?php echo $product['description']; ?></textarea>


</div>




<div class="mb-3">

<label class="form-label">
Price
</label>


<input type="number"
name="price"
class="form-control"
value="<?php echo $product['price']; ?>"
required>


</div>




<div class="mb-3">

<label class="form-label">
Image Name
</label>


<input type="text"
name="image"
class="form-control"
value="<?php echo $product['image']; ?>"
required>


</div>




<div class="mb-3">

<label class="form-label">
Category
</label>



<select name="category_id"
class="form-control">


<?php while($category = mysqli_fetch_assoc($categories)){ ?>


<option value="<?php echo $category['category_id']; ?>"


<?php

if($category['category_id'] == $product['category_id']){

echo "selected";

}

?>


>


<?php echo $category['category_name']; ?>


</option>


<?php } ?>


</select>


</div>




<button type="submit"
name="update_product"
class="btn btn-success">

Update Product

</button>



<a href="products.php"
class="btn btn-secondary">

Cancel

</a>



</form>



</div>




<?php include "../includes/footer.php"; ?>