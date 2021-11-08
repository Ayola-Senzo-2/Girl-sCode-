<?php
include 'connection.php';

if(isset($_POST['Sign_InBtn'])) {

    $phone = $_POST["phone"];
    $password = MD5($_POST["password"]);		
    
    $qry = "SELECT* FROM customer WHERE customer_phone= '$phone';";
    $result = $conn->query($qry);
    
    if(mysqli_num_rows($result) > 0) {
        $row = $result -> fetch_assoc();

        if($row["customer_phone"]== $_POST["phone"] && $row["customer_password"]==MD5($_POST["password"])){
            echo "logged in";
        } 
        else{
            echo "invalid log in credentials";
         }
    }
    
}

?>

<h2>Sign In</h2>
<form action = "" method="POST">
<table>
<tr>
<td>Phone</td><td><input type=text name="phone"></td></tr>
<tr><td>Password</td><td><input type=password name="password"></td></tr>
</table><br>

<input name= "Sign_InBtn" type=submit value="Sign In"><br>
<a href='SUGN_UP.php'>Sign up</a>
</form>
