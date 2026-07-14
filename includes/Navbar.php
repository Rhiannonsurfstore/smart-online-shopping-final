<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    @session_start();
}
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">


<a class="navbar-brand fw-bold" href="index.php">

🛍 Smart Online Shopping

</a>



<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarMenu">


<span class="navbar-toggler-icon"></span>


</button>





<div class="collapse navbar-collapse"
id="navbarMenu">





<ul class="navbar-nav ms-auto">



<li class="nav-item">

<a class="nav-link"
href="index.php">

Home

</a>

</li>





<li class="nav-item">

<a class="nav-link"
href="products.php">

Products

</a>

</li>






<li class="nav-item">

<a class="nav-link"
href="cart.php">

🛒 Cart

</a>

</li>






<?php if(isset($_SESSION['user_id'])){ ?>



<li class="nav-item">

<span class="nav-link text-white">

Welcome,
<?php echo $_SESSION['full_name']; ?>

</span>


</li>





<li class="nav-item">

<a class="btn btn-danger ms-2"
href="logout.php">

Logout

</a>


</li>




<?php }else{ ?>




<li class="nav-item">

<a class="btn btn-info ms-2"
href="register.php">

Register

</a>


</li>





<li class="nav-item">

<a class="btn btn-success ms-2"
href="login.php">

Login

</a>


</li>





<?php } ?>





</ul>





</div>


</div>


</nav>