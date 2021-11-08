<?php
include 'connection.php';
if(isset($_POST["Sign_UpBtn"])) {
		
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email= $_POST["email"];
    $phone = $_POST["phone"];
    $password = MD5($_POST["password"]);		
    
    $qry = "INSERT INTO customer (customer_f_name, customer_l_name, customer_email, customer_phone,customer_password)
                    VALUES ( '$firstname', '$lastname' , '$email' , $phone,'$password' )";

if($conn->query($qry)===TRUE){
    echo $qry;
}



  //  $GLOBALS['conn']->query($qry);
    
  
}

?>

<head>
<script type="text/javascript">
function validatePassword(pwd1, pwd2)
{sok = true;

if (pwd1 == "")
{
sok = false;
alert ("Password cannot be empty");
}
if (pwd1 != pwd2)
{
alert ("Passwords must match");
sok = false;

}

return sok;
}

</script>
</head>

<h2>Sign Up</h2>
<form action="" method=POST onsubmit = "return validatePassword(password.value, password2.value)">
<table>
<tr><td>First Name</td><td><input value="Dingaan" type=text name="firstname"></td></tr>
<tr><td>Last Name </td><td><input value="Letjane" type=text name="lastname"></td></tr>
<tr><td>E-mail</td><td><input value="velly@gmail.com" type=email name="email"></td></tr>
<tr><td>Phone</td><td><input value=0000000000 type=text name="phone"></td></tr>
<tr><td>Password</td><td><input type=password name="password"></td></tr>
<tr><td>Retype password</td><td><input type=password name="password2"></td></tr>
<tr><td colspan=2><input type=submit name = "Sign_UpBtn" value="Sign UP"></td></tr>
</table>
</form><!DOCTYPE html>
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