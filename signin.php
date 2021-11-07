<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sign In</title>
    
</head>
<body>
<?php
    require('connection.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $phone = stripslashes($_REQUEST['phone']);    // removes backslashes
        $phone = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `allcanteen` WHERE username='$phone'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $phone;
            // Redirect to another page page(home page)
           // header("Location: page.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect phone/password.</h3><br/>
                  <p class='link'>Click here to <a href='SignIn.php'>Sign In</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="SignIn">
        <h1 class="SignIn-title">Sign In</h1>
        <input type="text" class="SignIn-input" name="phone" placeholder="phone" autofocus="true"/>
        <input type="password" class="SignIn-input" name="password" placeholder="Password"/>
        <input type="submit" value="Sign In" name="submit" class="SignIn-button"/>
        <p class="link"><a href="SignUp.php">Sign Up</a></p>
  </form>
<?php
    }
?>
</body>
</html>