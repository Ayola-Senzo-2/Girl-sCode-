<?php

session_start();

require_once ("php/db.php");
require_once("./php/component.php");
require_once("connection.php");

$db = new db();

if(isset($_POST['checkout'])){
    if(isset($_SESSION['cust_address_id'])){ // checking if the user has selected a delivery address. 

    $total_final = $_SESSION['grand_total'];
    $pmod =$_POST['pmode'];
    $dtype =$_POST['delivery_type'];
    $delivey_add_id =$_POST['delivery_address_id'];
    $customer_id = $_SESSION['customer_id'];
    $order_total_tax_amount = 0;
    $order_rans_reference = rand();
    $order_note = "Meet me outside";
    $canteen_id = $_SESSION['canteen_id'];

	$query = "INSERT INTO orders (customer_id, canteen_id, cust_address_id, order_amount, order_payment_status,
        order_payment_method, order_type, order_status, order_total_tax_amount,  order_rans_reference, 
        dman_id, order_note) 
              VALUES ('$customer_id','$canteen_id', '$delivey_add_id','$total_final',DEFAULT,'$pmod','$dtype',DEFAULT,
              '$order_total_tax_amount','$order_rans_reference',NULL, '$order_note')";
	
	if(mysqli_query($conn,$query))
	{
		echo "Order placed successfully";
    unset($_SESSION["cart"]);
	}
	else
	{
		echo "Error, try again";
		echo $query;
	}

    } else {
        echo "<script>alert('Please select a delivery address...');
        document.location ='cart.php'</script>";
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
$fullAddress = $_SESSION['fullAdress'];


if(isset($_SESSION['cust_address_id'])){
  $cust_address_id = isset($_SESSION['cust_address_id']);
}else {



}

    ?>
       
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
        <form action="" method="POST" id="placeOrder">
        <h6 class="lead"><b>Delivery Options</h6>
        <div class="form-group radio-group">
            <input type="radio" name="delivery_type" value="Delivery"> Delivery
            <br>
            <input type="radio" name="delivery_type" value="Collection" > Collection
        </div>   
          <input type="hidden" name="delivery_address_id" value="<?= $cust_address_id;?>">
          <input type="hidden" name="total" value="<?=$total;?>">
          <h6 class="">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="">Choose Payment Type</option>
              <option value="Cash on delivery">Cash On Delivery</option>
              <option value="Pay Online">Pay Online</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="checkout" value="Confirm Order" class="btn-c text-center">
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
