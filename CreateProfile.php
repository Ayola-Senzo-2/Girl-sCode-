<?php
  include_once 'connection.php';
?>
<!doctype html>
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
                <i class="fas fa-shopping-basket"></i> Register
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

 <form action="" method="POST" >
     
     <caption aling=" center"><h2>Customer Details</h2></caption>
     <table align="left" with="250">
        <td align = "left">Name</td>
       <td align = "Right"><input type = "text" name = "txtName" value = ""></td>
       </tr> 
        <td align = "left">Surname</td>
       <td align = "Right"><input type = "text" name = "txtSurname" value = ""></td>
       </tr> 
        <td align = "left">Contact Number</td>
       <td align = "Right"><input type = "text" name = "txtContactNum" value = ""></td>
       </tr> 
        <td align = "left">E-mail</td>
       <td align = "Right"><input type = "text" name = "txtMail" value = ""></td>
       </tr> 
       <td align = "left">Password</td>
       <td align = "Right"><input type = "text" name = "txtPassword" value = ""></td>
       </tr>
     </table>
         
     <br/> <br/><br/> <br/><br/> <br/><br/> <br/>
     <caption aling=" center"><h2>Customer Address</h2></caption>
     <table align="left" with="250">
       <td align = "left">Street Name</td>
       <td align = "Right"><input type = "text" name = "txtStreet" value = ""></td>
       </tr> 
       <tr>
       <td align = "left">City</td>
       <td align = "Right"><input type = "text" name = "txtCity" value = ""></td>
       </tr>
       <td align = "left">Postal Code</td>
       <td align = "Right"><input type = "text" name = "txtPosCode" value = ""></td>
       </tr>
       
       <td align = "left"><button type="submit" name="submit"class="btn">Register</button></td>
     </table> 
    
 </form>
<?php
      
        if(isset($_POST['submit'])){
           if(!empty($_POST['txtName'])&& (!empty($_POST['txtSurname'])&&(!empty($_POST['txtContactNum'])&&
                   (!empty($_POST['txtMail'])&&(!empty($_POST['txtStreet'])&&(!empty($_POST['txtCity'])&&(!empty($_POST['txtPosCode'])))))))){
               
                $name = $_POST['txtName'];
                $surname = $_POST['txtSurname'];
                $noC =$_POST['txtContactNum'];
                $email =$_POST['txtMail'];
                $password = $_POST['txtPassword'];
                $strName =$_POST['txtStreet'];
                $city =$_POST['txtCity'];
                $pCode =$_POST['txtPosCode'];
            
                $sql = "INSERT INTO customer(customer_f_name,customer_l_name,customer_phone,customer_email, customer_password, customer_interest)
                   VALUES('$name','$surname','$noC','$email', '$password', 'Food')"; 
               
                $result =mysqli_query($conn,$sql) or die(mysqli_error());
                
                if($result)
                {
                    echo"New customer record created";
                }else{
                    echo"No record created";
                } 
                
                //Need to get customer ID that was ganerated
                $sql2 = "SELECT customer_id FROM `customer` WHERE customer_f_name = '$name' AND customer_l_name = '$surname'";
                $qry2 = mysqli_query($conn,$sql2) or die(mysqli_error());
                $Data = mysqli_fetch_assoc($qry2);
                $Custid = $Data['customer_id'];

                //Need to also insert a Zone - Not sure how we do this myb sql to get the zone num based on the city 
                
                
                echo ("The ID value is ". $Custid);
                // Insert Address Data 
                $sql3 = "INSERT INTO customer_address(customer_id, cust_street, cust_add_city, cust_add_portalcode, zone_id)
                        VALUES($Custid,'$strName','$city','$pCode', '1')";
                
                $result =mysqli_query($conn,$sql3) or die(mysqli_error());
                
                if($result)
                {
                    echo "New address record created";
                }else{
                    echo "No record created";
                } 
            }else
                {
                    echo "Please ensure that all fields are entered"; 
                }
        
        }
                
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>