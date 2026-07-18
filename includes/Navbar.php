<?php
// Detect if we are inside admin folder
$currentPage = $_SERVER['PHP_SELF'];

if (strpos($currentPage, '/admin/') !== false) {
    $path = "../";
} else {
    $path = "";
}
?>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">

<div class="container">


<a class="navbar-brand" href="<?php echo $path; ?>index.php">
    <i class="fas fa-shopping-cart"></i>
    Smart Online Shopping
</a>



<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarMenu">

<span class="navbar-toggler-icon"></span>

</button>



<div class="collapse navbar-collapse" id="navbarMenu">


<ul class="navbar-nav ms-auto align-items-center">



<li class="nav-item">

<a class="nav-link" href="<?php echo $path; ?>index.php">

<i class="fas fa-home me-1"></i>

Home

</a>

</li>




<li class="nav-item">

<a class="nav-link" href="<?php echo $path; ?>products.php">

<i class="fas fa-box-open me-1"></i>

Products

</a>

</li>




<li class="nav-item">

<a class="nav-link" href="<?php echo $path; ?>cart.php">

<i class="fas fa-shopping-cart me-1"></i>

Cart

</a>

</li>




<?php if(isset($_SESSION['user_id'])) { ?>


<li class="nav-item">


<span class="nav-link">

<i class="fas fa-user-circle me-1"></i>

<?php echo htmlspecialchars($_SESSION['full_name']); ?>


</span>


</li>




<li class="nav-item">


<a class="btn btn-danger ms-3" href="<?php echo $path; ?>logout.php">


<i class="fas fa-sign-out-alt"></i>

Logout


</a>


</li>



<?php } else { ?>



<li class="nav-item">


<a class="btn btn-info ms-3" href="<?php echo $path; ?>register.php">


<i class="fas fa-user-plus"></i>

Register


</a>


</li>





<li class="nav-item">


<a class="btn btn-success ms-2" href="<?php echo $path; ?>login.php">


<i class="fas fa-sign-in-alt"></i>

Login


</a>


</li>



<?php } ?>



</ul>


</div>


</div>


</nav>