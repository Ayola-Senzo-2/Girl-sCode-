<?php
session_start();
include 'connection.php';
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Canteen</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>


<header id="header">
    <nav class="navbar navbar-expand-lg nav-bg">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5 menu-title">
                <i class="fas fa-shopping-basket"></i> Login
            </h3>
        </a>
        
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
                       
                    </h5>
                </a>


                <a href="login.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Sign In      
                    </h5>
                </a>

            </div>
        </div>

    </nav>
</header>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST" >
            
       <div class="inputBox">
            <label for="customer_phone">phone_Number</label>
            <input align="right" type="text" id="phone_Number" name="phone_Number" placeholder="phone_Number" value=" "required> 
        </div>
            
        <div class="inputBox">
            <label for="Password">Password</label>
            <input type="text" id="password" name="password" placeholder="password" value=" "required> 
        </div>
            
        <div class="inputBox">
            <button type="submit" name="submit"class="btn">Login</button>
        
        </form>
        
        <?php
            if(isset($_POST['submit'])){
                
                $phoneNo = $_POST['phone_Number'];
                $passwd = $_POST['password'];
                
                    $qry = "SELECT * FROM customer WHERE customer_phone ='$phoneNo'";// AND 'customer_password'='$passwd'";
                    
                    $sql = mysqli_query($conn, $qry);
                    $num_rows = mysqli_num_rows($sql);
                    
                    $data = mysqli_fetch_assoc($sql);                     
                    if($num_rows == 1){

                        $_SESSION['name'] = $data['customer_f_name'];
                        $_SESSION['surname'] = $data['customer_l_name'];
                        $_SESSION['id'] = $data['customer_id'];
                        $_SESSION['Phone'] = $data['customer_phone'];
                        $_SESSION['password'] = $data['customer_password'];
                        $_SESSION['email'] = $data['customer_email'];
                                
                        $id = $data['customer_id'];      
                        // Get Address of the Logged in customer    
                        $qry2 = "SELECT * FROM customer_address WHERE customer_id ='$id' ";
                        $sql = mysqli_query($conn, $qry2);
                        $data2 = mysqli_fetch_assoc($sql); 
                        
                        $_SESSION['postalCode'] = $data2['cust_add_postalcode'];
                        $_SESSION['city'] = $data2['cust_add_city'];
                        $_SESSION['strtName'] = $data2['cust_street'];
                                
                        header("Location: Welcome.php");
                             
                     }else{
                         echo("username or password is incorrect");
                        
                     }
                     
                         
            }
             
        ?>
        <a href="CreateProfile.php">Click here to Register </a>
        
    </body>
</html>