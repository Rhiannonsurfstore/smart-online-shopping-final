<?php

include "config/database.php";

include "includes/header.php";

include "includes/Navbar.php";


$message = "";

$message_type = "";



if(isset($_POST['register'])){


    $full_name = $_POST['full_name'];

    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = "customer";




    // Check existing email

    $check = mysqli_prepare($conn,
    "SELECT user_id FROM users WHERE email=?");



    mysqli_stmt_bind_param($check,"s",$email);


    mysqli_stmt_execute($check);


    $check_result = mysqli_stmt_get_result($check);




    if(mysqli_num_rows($check_result)>0){


        $message = "Email already exists. Please use another email.";

        $message_type = "danger";


    }else{



        // Insert user securely

        $stmt = mysqli_prepare($conn,
        "INSERT INTO users(full_name,email,password,role)
         VALUES(?,?,?,?)");



        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $full_name,
            $email,
            $password,
            $role
        );




        if(mysqli_stmt_execute($stmt)){


            $message = "Registration successful! You can now login.";

            $message_type = "success";


        }else{


            $message = "Registration failed!";

            $message_type = "danger";


        }



    }



}


?>




<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-5">


<div class="card shadow p-4">



<h2 class="text-center mb-4">
Create Account 🛍
</h2>





<?php if($message!=""){ ?>


<div class="alert alert-<?php echo $message_type; ?>">

<?php echo $message; ?>

</div>



<?php } ?>






<form method="POST">





<div class="mb-3">


<label class="form-label">
Full Name
</label>


<input type="text"
name="full_name"
class="form-control"
required>


</div>






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







<button class="btn btn-primary w-100"
name="register">

Create Account

</button>





</form>





</div>


</div>


</div>


</div>





<?php include "includes/footer.php"; ?>