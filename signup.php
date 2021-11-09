<?php
session_start();

require_once ('php/db.php');
require_once ('./php/component.php');
//create instance of db class
$db = new db();

if(isset($_POST["Sign_UpBtn"])) {
		
    $firstname =  mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname =   mysqli_real_escape_string($conn,$_POST["lastname"]);
    $email= mysqli_real_escape_string($conn,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $check_email = "SELECT * FROM customer WHERE customer_email = '$email'";

    if(mysqli_num_rows(mysqli_query($conn,$check_email))>0){
        echo "<script> alert('Email is already taken.')</script>";
    } else {

       $sql = "INSERT INTO customer (customer_f_name, customer_l_name, customer_email, 
        customer_phone,customer_password)  VALUES ( '$firstname', '$lastname' , '$email' , '$phone','$password' )";
      
      $result = mysqli_query($conn,$sql);
      if($result){
        echo "<script> alert('Sign up successfully')</script>";
      } else { 
        echo "<script> alert('Ooops something went wrong')</script>";
      }
    }

}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AllCanteen</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>


<header id="header">
    <nav class="navbar navbar-expand-lg nav-bg">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5 menu-title">
                <i class="fas fa-shopping-basket"></i> AllCanteen
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">  
            <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-search"></i> Search     
                    </h5>
                </a>

                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
                <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Profile     
                    </h5>
                </a>

            </div>
        </div>

    </nav>
</header>


<h2>Sign Up</h2>
<form action="" method=POST onsubmit = "return validatePassword(password.value, password2.value)">
<table>
<tr><td>First Name</td><td><input value="Dingaan" type=text name="firstname"></td></tr>
<tr><td>Last Name </td><td><input value="Letjane" type=text name="lastname"></td></tr>
<tr><td>E-mail</td><td><input value="velly@gmail.com" type=email name="email"></td></tr>
<tr><td>Phone</td><td><input value=0000000000 type=text name="phone"></td></tr>
<tr><td>Password</td><td><input type=password value=0000000000 name="password"></td></tr>
<tr><td>Retype password</td><td><input value=0000000000 type=password name="password2"></td></tr>
<tr><td colspan=2><input type=submit  name = "Sign_UpBtn" value="Sign UP"></td></tr>
</table>
</form>

<script type="text/javascript">
function validatePassword(pwd1, pwd2){ 
    
sok = true;
if (pwd1 == "")
{
sok = false;
alert ("Password cannot be empty");
}
if (pwd1 != pwd2)
{
alert ("Passwords must match");
sok = false;
}

return sok;
}

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>