<?php
session_start();

require_once ('php/db.php');
require_once ('./php/component.php');
require_once('connection.php');


//create instance of db class
$db = new db();

if (isset($_POST['add'])){
    /// print_r($_POST['food_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "food_id");

        if(in_array($_POST['food_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'food_id' => $_POST['food_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'food_id' => $_POST['food_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>AllCanteen - Search</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AllCanteen</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once ("php/header.php"); ?>


        <div class="search-container">

        <form action="search_food.php" method="post">

       <div class="slidecontainer">
       <span>Price Range: </span> 
         <input type="range" min="1" max="100" name="price-range" value="1" class="slider" id="myRange">
         <p>From R0 To R<span id="demo"></span></p>

        </div>

        <div class="filter-dropdown">
        <span>Filter by Canteens: </span> 
        <select class="search-input" width="50"  name="filter-canteen" onchange='filter.submit()'>
        <option name="filter-canteen" value="">Choose Canteen</option>

        <?php 
            $sql_canteen = "SELECT DISTINCT * FROM canteen";
            $canteen_results = mysqli_query($conn,$sql_canteen);
            while($row = mysqli_fetch_assoc($canteen_results)){
                $canteen = $row['canteen_name'];?>
              <option name="filter-canteen" value="<?php echo $canteen ?>"><?php echo $canteen ?></option>
            <?php }?>
        </select>
        </div>

        <br>
            <input class="search-input" required size="50" type=text name=search_query placeholder="search food..."> 
            <input class="btn btn-secondary" name= "search_btn" Value="Search" type=submit>
         </form>
         </div>



         <?php if(isset($_POST['search_btn'])){?>


      <div class="container">
        <div class="row text-center py-5">
        <?php

        $filter_range_price = $_POST['price-range'];
        $filter_canteen = $_POST['filter-canteen'];
        $search_input = $_POST['search_query'];

        if($filter_range_price !=='' || $filter_canteen !=='' || $search_input !=='' ){

            $sql = "SELECT * FROM canteen c, food f
            WHERE f.canteen_id = c.canteen_id
            AND LOWER(c.canteen_name) LIKE '%$filter_canteen%'
            AND LOWER(f.food_name) LIKE '%$search_input%' 
            OR f.food_price BETWEEN 0 AND $filter_range_price";
            
            $result  = mysqli_query($conn, $sql);
        }
                if(!mysqli_num_rows($result))
                {                    
                    echo "<script>alert('No food found, please search again...');
                    document.location ='search_food.php'</script>";
                } else {
                while ($row = mysqli_fetch_assoc($result)){ 

                    $food_name = $row['food_name'];
                    $canteen_name = $row['canteen_name'];
                    $food_desc = $row['food_desc'];
                    $food_price = $row['food_price'];
                    $food_image = $row['food_image'];
                    $food_id = $row['food_id']; ?>

            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="" method="post">
                    <div class="item-card card shadow">
                        <div>
                            <img src="upload/<?php echo $food_image;?>" alt="Image1" class="img img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food_name;?></h5>
                            <h6><i class="fas fa-store"></i> <?php echo $canteen_name;?></h6>
                            <p class="card-text"><?php echo $food_desc;?></p>
                            <h5>
                                <span class="price">R<?php echo $food_price;?></span>
                            </h5>
                            <button type="submit" class="btn add-cart-btn" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                             <input type='hidden' name='food_id' value='<?php echo $food_id;?>'>
                        </div>
                    </div>
                </form>
            </div>

            <?php }}?>
            </div>
        </div>
           
        
        <?php } else { ?>

            
    <div class="container">
        <div class="row text-center py-5">
            
         <?php   $result = $db->getData();
            while ($row = mysqli_fetch_assoc($result)){ 
                $food_name = $row['food_name'];
                $canteen_name = $row['canteen_name'];
                $food_desc = $row['food_desc'];
                $food_price = $row['food_price'];
                $food_image = $row['food_image'];
                $food_id = $row['food_id']; ?>

            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="" method="post">
                    <div class="item-card card shadow">
                        <div>
                            <img src="upload/<?php echo $food_image;?>" alt="Image1" class="img img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food_name;?></h5>
                            <h6><i class="fas fa-store"></i> <?php echo $canteen_name;?></h6>
                            <p class="card-text"><?php echo $food_desc;?></p>
                            <h5>
                                <span class="price">R<?php echo $food_price;?></span>
                            </h5>
                            <button type="submit" class="btn add-cart-btn" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                             <input type='hidden' name='food_id' value='<?php echo $food_id;?>'>
                        </div>
                    </div>
                </form>
            </div>

            <?php }?>

            </div>
        </div>

       <?php } ?>


<script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
        output.innerHTML = this.value;
}

</script>

</body>
</html>