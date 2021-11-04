<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sign In</title>
    <!--<link rel="stylesheet" href="style.css"/>-->
</head>
<body>
<?php
    require('connection.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
        $firstname   = mysqli_real_escape_string($con, $firstname);
        $lastname    = stripslashes($_REQUEST['lastname']);
        $lastname    = mysqli_real_escape_string($con, $lastname);
        $email       = stripslashes($_REQUEST['email']);
        $email       = mysqli_real_escape_string($con, $email);
        $password    = stripslashes($_REQUEST['email']);
        $password    = mysqli_real_escape_string($con, $password);
      
      
        $query    = "INSERT into `customer` (customer_f_name, customer_l_name, customer_email, customer_phone,customer_password)
                     VALUES ('$firstname', '$lastname', '$email' , '$email', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='SignIn.php'>Sign In</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='SignUp.php'>Sign Up</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="SignUp-title">Sign Up</h1>
        <input type="text" class="SignUp-input" name="firstname" placeholder="first name" required />
        <input type="text" class="SignUp-input" name="lastname" placeholder="last name">
        <input type="email" class="SignUp-input" name="email" placeholder="email">
        <input type="text" class="SignUp-input" name="phone" placeholder="phone">
        <input type="password" class="SignUp-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Sign UP" class="SignIn-button">
        <p class="link"><a href="SignIn.php">Click to Sign In</a></p>
    </form>
<?php
    }
?>
</body>
</html>