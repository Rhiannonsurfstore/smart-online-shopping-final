<?php
session_start();
include "admin_check.php";
include "../config/database.php";
include "../includes/header.php";
include "../includes/Navbar.php";

$query = "SELECT products.*, categories.category_name
          FROM products
          JOIN categories
          ON products.category_id = categories.category_id
          ORDER BY product_id DESC";

$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">

<h2>Manage Products</h2>

<a href="add_product.php" class="btn btn-primary mb-3">
Add New Product
</a>

<table class="table table-bordered table-striped">

<thead>

<tr>
    <th>ID</th>
    <th>Product</th>
    <th>Category</th>
    <th>Price</th>
    <th>Actions</th>
</tr>

</thead>

<tbody>

<?php while($product = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $product['product_id']; ?></td>

<td><?php echo $product['product_name']; ?></td>

<td><?php echo $product['category_name']; ?></td>

<td><?php echo number_format($product['price'],2); ?> RWF</td>

<td>

<a href="edit_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_product.php?id=<?php echo $product['product_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this product?');">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "../includes/footer.php"; ?>