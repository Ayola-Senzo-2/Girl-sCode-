<?php

session_start();

require_once ("php/db.php");
require_once("./php/component.php");

$db = new db();

if(isset($_POST['checkout'])){
    if(isset($_SESSION['customer_id'])){
        if(isset($_SESSION['fullAdress'])){

        } else {
            echo "<script>alert('Please select a delivery address...');
            document.location ='cart.php'</script>";
        }

    } else {

        echo "<script>alert('Please sign in first...');
        document.location ='user_auth.php'</script>";
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
    <title>Cart - AllCanteen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');

    $total = $_SESSION['grand_total'];
    $items = $_SESSION['items'];
    $total = number_format($total,2);
    $fullAddress = $_SESSION['fullAdress'];?>


       
    <div class="container confirm-container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4 card "  id="order">
        <h4 class="text-center text-complete-order">Complete your order!</h4>
        <div class="p-3 mb-2 text-center">
          <h6 class="lead"><b>Items(s) : </b><?=$items;?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount: </b>R<?=$total;?></h5>
        </div>


        <div class="p-3 mb-2 form-group">
        <h6 class="lead"><b>Deliver To:</h6>
          <h6><?=$fullAddress;?></h6>
        </div>
        <form action="#" method="post" id="placeOrder">
        <h6 class="lead"><b>Delivery Options</h6>
        <div class="form-group radio-group">
            <input type="radio" name="group" value="Delivery"> <span class="">Delivery</span>
            <br>
            <input type="radio" name="group" value="Collection" > Collection
        </div>   
          <input type="hidden" name="products" value="food">
          <input type="hidden" name="grand_total" value="44">
          <h6 class="">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="cod">Cash On Delivery</option>
              <option value="cod">Pay Online</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Confirm Order" class="btn-c text-center">
          </div>
        </form>
      </div>
    </div>
  </div>  
     

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
