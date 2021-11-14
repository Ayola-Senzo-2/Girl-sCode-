<?php 
session_start();
include_once("./config.php");
require_once('connection.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>AllCanteen - Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">



</head>
<body>

<header id="header">
    <nav class="navbar navbar-expand-lg nav-bg">
        <a href="<?php echo BASE_URL."index.php"; ?>" class="navbar-brand">
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
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">

            
    
                <?php if(isset($_SESSION['customer_id']))
                { ?>

               <a href="<?php echo BASE_URL."profile.php"; ?>" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Dingaan </h5></a>

                <?php }  else  { ?>

                    <a href="<?php echo BASE_URL."user_auth.php"; ?>" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> </h5></a>
                    <?php }?>
            </div>
        </div>

    </nav>
</header>

<br>
<br>
<br>
<br>


<div class="container" >
    <div class = "row">
    
<table class="table table-bordered mytable" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Order#</th>
      <th scope="col">Canteen</th>
      <th scope="col">Date</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Status</th>
    </tr>

  </thead>
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">
      
      <select name="payment-status" id="payment-status" class="payment-status">
            <option value="">Filter by</option>
            <option value="paid">paid</option>
            <option value="unpaid">unpaid</option>
        </select>

      </th>
      <th scope="col">
          
      <select name="payment-status" id="payment-status" class="payment-status">
            <option value="">Filter by</option>
            <option value="paid">paid</option>
            <option value="unpaid">unpaid</option>
        </select>
      </th>
      <th scope="col">
      
        <select name="payment-status" id="payment-status" class="payment-status">
            <option value="">Filter by</option>
            <option value="paid">paid</option>
            <option value="unpaid">unpaid</option>
        </select>

      </th>
    </tr>

  </thead>

  <tbody>

  <?php

$customer_id = $_SESSION['customer_id'];
  $sql = "SELECT * FROM orders o";



  $order_num;
  $canteen_name;
  $order_place_date;
  $order_payment_status;
  $order_payment_type;
  $order_delivery_type;
  $order_status;

  $order_results = mysqli_query($conn,$sql);


  while($rows = mysqli_fetch_assoc($order_results)){

    $order_num = $rows['order_id'];
   // $canteen_name = $rows['canteen_name'];
    $order_place_date  = $rows['order_created_at'];;
    $order_payment_status  = $rows['order_payment_status'];;
    $order_payment_type  = $rows['order_payment_method'];
    $order_status  = $rows['order_status'];
   // $order_delivery_type  = $rows['order_id'];;
  
  ?>

    <tr>
      <th scope="row"><?php echo $order_num;?></th>
      <td>Corridor Hills</td>
      <td><?php echo  $order_place_date;?></td>
      <td><?php echo  $order_payment_type;?></td>
      <td><?php echo  $order_payment_status;?></td>
      <td><?php echo  $order_status;?></td>
    </tr>


    <?php } ?>
  </tbody>
</table>



</div>
 </div>

 

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready( function () {
    $('.mytable').DataTable({
        stateSave: true
    });
} );
</script>


</body>
</html>