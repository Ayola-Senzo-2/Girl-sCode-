<?php 
session_start();

require_once('config.php');
include 'connection.php';
require_once ('php/db.php');
require_once ('./php/component.php');
//create instance of db class
$db = new db();

//sign in
if(isset($_POST['Sign_InBtn'])) {

    $phone = filter_input(INPUT_POST,'phone');
    $password = filter_input(INPUT_POST, 'password');
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


    //sign up 
    if(isset($_POST["Sign_UpBtn"])) {
		
        $firstname =  filter_input(INPUT_POST, 'firstname');
        $lastname =   filter_input(INPUT_POST, 'lastname');
        $email= filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $street = filter_input(INPUT_POST, 'street');
        $city = filter_input(INPUT_POST, 'city');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $password =filter_input(INPUT_POST, 'password');
    
        $password = md5($password);
    
        $check_phone = "SELECT * FROM customer WHERE customer_phone = '$phone'";

        $last_id = "SELECT MAX(customer_id) 
                    FROM customer";

        $last_id_result = mysqli_query($conn,$last_id);
        $last_id_row = mysqli_fetch_assoc($last_id_result);

        $cust_last_id =  $last_id_row['MAX(customer_id)'];
        $cust_last_id  = $cust_last_id + 1;

    
        if(mysqli_num_rows(mysqli_query($conn,$check_phone))>0){
            echo "<script> alert('Phone is already taken.')</script>";
        } else {
    
           $sql = "INSERT INTO customer (customer_f_name, customer_l_name, customer_email, 
            customer_phone,customer_password)  VALUES ( '$firstname', '$lastname' , '$email' , '$phone','$password' )";

            $sql_2 = "INSERT INTO  customer_address (customer_id,zone_id, cust_address_street,cust_address_city, cust_address_postalcode) 
            VALUES($cust_last_id,'1','$street', '$city', '$postal_code')";

         // $result = mysqli_query($conn,$sql);
          if(mysqli_query($conn,$sql)){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>


<header id="header">
<body>

<?php require_once ("php/header.php"); ?>


<div class="container">
  <div class="row">
    <div class="col">

    
    
<div class="container confirm-container">
    <div class="row justify-content-center">
      <div class="px-4 pb-4 card">
        <h4 class="text-center text-complete-order">Sign up</h4>
        
        <form action="" method=POST onsubmit = "return validatePassword(password.value, password2.value)">
        <table>
        <tr><td>First Name</td><td><input class="inputs" value="Dingaan" type=text name="firstname"></td></tr>
        <tr><td>Last Name </td><td><input class="inputs" value="Letjane" type=text name="lastname"></td></tr>
        <tr><td>E-mail</td><td><input  class="inputs" value="velly@gmail.com" type=email name="email"></td></tr>
        <tr><td>Phone</td><td><input class="inputs" value=0000000000 type=text name="phone"></td></tr>
        <tr><td>Street</td><td><input class="inputs" value = "Zeekoewater 311-JS"  type=text name="street"></td></tr>
        <tr><td>City</td><td><input class="inputs" value = "eMalahleni"  type=text name="city"></td></tr>
        <tr><td>Postal_code</td><td><input class="inputs" value = "1034"  type=text name="postal_code"></td></tr>
        <tr><td>Password</td><td><input class="inputs" type=password name="password"></td></tr>
        <tr><td>Confirm password </td><td><input  class="inputs" type=password name="password2"></td></tr>
        </table>
        <input size='50'  class="btn btn-success"type=submit  name = "Sign_UpBtn" value="Sign up">
        </form>
      </div>
    </div>
  </div>



</div>
    <div class="col">
    <div class="container confirm-container">
    <div class="row justify-content-center">
      <div class="px-4 pb-4 card">
        <h4 class="text-center text-complete-order">Sign in</h4>
        <form action = "" method="POST">
            <table>
            <tr>
            <td>Phone</td><td><input  class="inputs" type=text name="phone"></td></tr>
            <tr><td>Password</td><td><input class="inputs" type=password name="password"></td></tr>
            </table><br>
            <input class="btn btn-success" name= "Sign_InBtn" type=submit value="sign in"> 
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>


  
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