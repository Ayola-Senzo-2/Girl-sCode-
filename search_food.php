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
        <form action="search_food.php" method="get">
            <input class="search-input"  size="50" type=text name=search_food placeholder="search food"> 
            <input class="btn btn-secondary" name= "search_btn" type=submit>
         </form>
         </div>

         <?php if(isset($_GET['search_btn'])){ 
            
            
         
        
        }

         ?>

</body>
</html>