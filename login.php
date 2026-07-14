<?php

session_start();

include "config/database.php";

include "includes/header.php";
include "includes/Navbar.php";


$message = "";



if(isset($_POST['login'])){


    $email = $_POST['email'];

    $password = $_POST['password'];



    // Secure query using prepared statement

    $stmt = mysqli_prepare($conn,
    "SELECT * FROM users WHERE email=?");



    mysqli_stmt_bind_param($stmt,"s",$email);



    mysqli_stmt_execute($stmt);



    $result = mysqli_stmt_get_result($stmt);



    $user = mysqli_fetch_assoc($result);




    if($user && password_verify($password,$user['password'])){


        $_SESSION['user_id'] = $user['user_id'];

        $_SESSION['full_name'] = $user['full_name'];

        $_SESSION['role'] = $user['role'];



        header("Location: index.php");

        exit;



    }else{


        $message = "Invalid email or password";


    }



}



?>





<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-5">


<div class="card shadow p-4">



<h2 class="text-center mb-4">
🔐 Login
</h2>




<?php if($message!=""){ ?>

<div class="alert alert-danger">

<?php echo $message; ?>

</div>


<?php } ?>





<form method="POST">





<div class="mb-3">


<label class="form-label">
Email
</label>


<input type="email"
name="email"
class="form-control"
required>


</div>






<div class="mb-3">


<label class="form-label">
Password
</label>


<input type="password"
name="password"
class="form-control"
required>


</div>






<button class="btn btn-success w-100"
name="login">

Login

</button>





</form>




</div>


</div>


</div>


</div>





<?php include "includes/footer.php"; ?>