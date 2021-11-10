<?php
session_start();

require_once ('php/db.php');
require_once ('./php/component.php');


//create instance of db class
$db = new db();


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

        <form action="search_food.php" method="GET">

       <div class="slidecontainer">
       <span>Price Range: </span> 
         <input type="range" min="1" max="100" name="price-range" value="50" class="slider" id="myRange">
         <p>From R0 To R<span id="demo"></span></p>

        </div>

        <div class="filter-dropdown">
        <span>Filter by Canteens: </span> 
        <select class="search-input" width="50"  name="filter-canteen" onchange='filter.submit()'>
        <option name="filter-canteen" value="">option1</option>
        <option name="filter-canteen" value="">option2</option>
        <option name="filter-canteen" value="">option3</option>
        <option name="filter-canteen" value="">option3</option>
        </select>
        </div>

        <br>
            <input class="search-input" required size="50" type=text name=search_query placeholder="search food or canteen"> 
            <input class="btn btn-secondary" name= "search_btn" Value="Search" type=submit>
         </form>
         </div>



         <?php if(isset($_POST['search_btn'])){?>


      <div class="container">
        <div class="row text-center py-5">
        <?php
                $result = $db->searchFood($_POST['search_query']);
                if( $result===0)
                {                    
                    echo "<script>alert('No food or canteen found, please search again...');
                    document.location ='search_food.php'</script>";
                } else {
                while ($row = mysqli_fetch_assoc($result)){
				component($row['food_name'],$row['canteen_name'],$row['food_desc'], $row['food_price'], $row['food_image'], $row['food_id']);
                
                }}?>
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