<?php

require_once('config.php');
include 'connection.php';
session_start();
require_once ('php/db.php');
require_once ('./php/component.php');
//create instance of db class
$db = new db();

if(isset($_POST['Sign_InBtn'])) {

    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);


        $sql = "SELECT customer_id FROM customer WHERE customer_phone = '$phone'
                AND customer_password = '$password'";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                $rows = mysqli_fetch_assoc($result);
                $_SESSION["customer_id"] = $rows['customer_id'];
                header("Location: index.php");        
            }else{
                echo "<script> alert('Login failed. Please try again')</script>";
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

<div class="container confirm-container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4 card">
        <h4 class="text-center text-complete-order">Sing in</h4>
        <div class="p-3 mb-2 text-center">
          
     </div>
        <form action = "" method="POST">
            <table>
            <tr>
            <td>Phone</td><td><input type=text name="phone"></td></tr>
            <tr><td>Password</td><td><input type=password name="password"></td></tr>
            </table><br>
            <input class="btn btn-primary" name= "Sign_InBtn" type=submit value="sign in"> 
            <a class="btn btn-secondary" href='<?php echo BASE_URL."signup.php"; ?>'>sign up</a>
        </form>
      </div>
    </div>
  </div> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
