<?php
session_start();
include "admin_check.php";
include "../config/database.php";
include "../includes/header.php";
include "../includes/Navbar.php";

$message = "";

if(isset($_POST['add_product'])){

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];

    $query = "INSERT INTO products(product_name, description, price, image, category_id)
              VALUES('$product_name', '$description', '$price', '$image', '$category_id')";

    if(mysqli_query($conn, $query)){
        $message = "Product added successfully!";
    }else{
        $message = "Failed to add product.";
    }
}

$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<div class="container mt-5">

<h2>Add New Product</h2>

<?php if($message != ""){ ?>
<div class="alert alert-success">
    <?php echo $message; ?>
</div>
<?php } ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Product Name</label>
<input type="text" name="product_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label class="form-label">Price</label>
<input type="number" name="price" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Image Name</label>
<input type="text" name="image" class="form-control" placeholder="example.jpg" required>
</div>

<div class="mb-3">
<label class="form-label">Category</label>

<select name="category_id" class="form-control">

<?php while($category = mysqli_fetch_assoc($categories)){ ?>

<option value="<?php echo $category['category_id']; ?>">
    <?php echo $category['category_name']; ?>
</option>

<?php } ?>

</select>

</div>

<button type="submit" name="add_product" class="btn btn-primary">
Add Product
</button>

</form>

</div>

<?php include "../includes/footer.php"; ?>