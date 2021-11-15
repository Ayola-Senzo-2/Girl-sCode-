<?php 
include_once("./config.php");
include_once("./connection.php");
//error_reporting(0);

?>


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


        <form name=form1 action='' method=POST>


        <?php


if(isset($_SESSION['customer_id'])){

    $customer_id = $_SESSION['customer_id'];

    //echo $customer_id;


    if (isset($_POST['cust_address_id']))   
    $selval=$_POST['cust_address_id'];
    else 
     $selval='%';

     $sql = "SELECT * 
     FROM 
     customer_address ca, customer c
     WHERE ca.customer_id = c.customer_id
     AND ca.customer_id = '$customer_id'";

     $result = mysqli_query($conn,$sql);

     if(!$result){

     } else {

echo "<select name=cust_address_id onchange='form1.submit()'>";
echo "<option value=''>Please select delivery address</option>";

while ($row = mysqli_fetch_assoc($result)){
    if ($selval==$row['cust_address_id']){
    $selsel=" Selected";
    $_SESSION['city'] =  $row['cust_address_city'];
    $_SESSION['street'] = $row['cust_address_street'];
    $_SESSION['portal_code'] = $row['cust_address_portalcode'];
    $_SESSION['fullAdress'] = $row['cust_address_street'].", ".$row['cust_address_city'].", ".$row['cust_address_portalcode'];
    $_SESSION['cust_address_id'] = $row['cust_address_id'];

    }
 else 
    $selsel="";
    $fullAdress = $row['cust_address_street'].", ".$row['cust_address_city'].", ".$row['cust_address_portalcode'];
    echo "<option  value=".$row['cust_address_id'].$selsel.">".$fullAdress."</option>";  
}

echo"</select>";

     }

} else{

}
        ?>

        </form>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">

            <a href="<?php echo BASE_URL."search_food.php"; ?>" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-search"></i> Search     
                    </h5>
                </a>

                <a href="<?php echo BASE_URL."cart.php"; ?>" class="nav-item nav-link active">
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

                <?php if(isset($_SESSION['customer_id']))
                { ?>

               <a href="<?php echo BASE_URL."profile.php"; ?>" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Profile</h5></a>

                <?php }  else  { ?>

                    <a href="<?php echo BASE_URL."user_auth.php"; ?>" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Sign in</h5></a>
                    <?php }?>

            </div>
        </div>

    </nav>
</header>