<?php
session_start();
  
          $name=$_SESSION['name'];
          $surn=$_SESSION['surname']; 
          $phoneNo=$_SESSION['Phone'];
          $passwrd=$_SESSION['password'];
          $email=$_SESSION['email'];
          $strName=$_SESSION['strtName'];
          $city=$_SESSION['city'];
          $code=$_SESSION['postalCode'];
          
                   
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
                <i class="fas fa-shopping-basket"></i> Welcome<?php echo(" ".$name." ".$surn);?>
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
                
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                        <i class="fas fa-shopping-cart"></i> Order History 
                       
                    </h5>
                </a>

                <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Logout       
                    </h5>
                </a>

            </div>
        </div>

    </nav>
</header>

<?php

       echo "<caption><h2>User Profile</h2></caption>";
       echo "<table align ='left' width ='250'>";
       
       
       echo"<td align = 'Left'>Name</td>";
       echo "<td align = 'Right'><input type = 'text' name = txtName value = $name></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'Left'>Surname</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtSurname' value = $surn></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'Left'>Contact Number</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtContact' value = $phoneNo></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'Left'>E-mail</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtEmail' value = $email></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'Left'>Password</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtEmail' value = $passwrd></td>";
       echo "</tr>";
       
             
       echo "<tr>";
       echo "<td align = 'left'><input type = 'submit' name = 'btnSubmit' value = 'Update Details'></td>";
       echo "</tr>";
       echo "</table>";
       
       echo "<br> </br><br> </br><br> </br> <br> </br>";
      
       
       echo "\n<caption ><h3>User Address</h3></caption>";
       echo "\n<table align ='left' width ='250'>";
    
       
       echo"<td align = 'left'>Street Name</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtStreetName' value = $strName></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'left'>City</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtCity' value = $city></td>";
       echo "</tr>";
       
       echo "<tr>";
       echo"<td align = 'left'>Postal Code</td>";
       echo "<td align = 'Right'><input type = 'text' name = 'txtPostalCode' value = $code></td>";
       echo "</tr>";
       
       
       echo "<tr>";
       echo "<td align = 'left'><input type = 'submit' name = btnSubmit value = 'Update Address'></td>";
       echo "</tr>";
       echo "</table>";
       
      if(isset($_POST['btnSubmit'])){
          
         if($_POST['name']= " " || $_POST['surn'] =" " ||$_POST['phoneNo']=" "||
                   $_POST['email']=" " || $_POST['passwrd']= " ")
                   {
                  
                 echo "<script type="text/Javascript">alert("Enter Data in all fields")</script>";
         } else {
             
         }
               
              $id= $_POST["id"];
              $update = "UPDATE customer SET customer_f_name = '$name',
                                             customer_l_name= '$surn',
                                             customer_phone = '$phoneNo',
                                             customer_password = '$passwrd',
                                             customer_email = '$email';
                                             WHERE customer_id = $id";
       }                           
       
               
?>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>