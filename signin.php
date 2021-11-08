
<?php 
require_once ('php/db.php');
require_once ('./php/component.php');
//create instance of db class
$db = new db();


require('connection.php');
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>AllCanteen - signin</title>

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php require_once ("php/header.php"); ?>

<div class="container confirm-container">
    <div class="row justify-content-center">
    <div class="col-lg-6 px-4 pb-4 card ">
        <h4 class="text-center text-complete-order">Singin</h4>
        <div class="p-3 mb-2 text-center">
          
        </div>

            <form class="form-group" action = "signin.php" method="GET">
            <table>
            <tr>
            <td>Username </td><td><input type=text name=username></td></tr>
            <tr><td>Password </td><td><input type=password name=password></td></tr>
            </table>
            <br>
            <button type="submit" class="btn btn-success btn-animated">Sign in <i class="fa fa-sign-in"></i></button>
            </form>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>