<?php
    session_start();
    $id = $_SESSION['id'];  
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
        <style>
            body{
                background-color: windowframe;
            }
            input{
                width: 40%;
                height: 5%;
                border: 1px;
                border-radius: 05px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 10px 0px;
                box-shadow: 1px 1px 2px 1px grey;
            }
        </style>
    </head>
    <body>
    <center>
        <h1> Update User Profile </h1>
        <form action="" method="POST">
            <input type="text" name="txtName" placeholder="Enter first name"/><br/>
            <input type="text" name="txtSurname" placeholder="Enter last surname"/><br/>
            <input type="text" name="txtContact" placeholder="Enter phone number"/><br/>
            <input type="text" name="txtEmail" placeholder="Enter email"/><br/>
             <input type="text" name="txtpasswrd" placeholder="Enter password"/><br/>
            <input type="text" name="txtStreetName" placeholder="Enter street name"/><br/>
            <input type="text" name="txtCity" placeholder="Enter city name"/><br/>
            <input type="text" name="txtPostalCode" placeholder="Enter postal Code"/><br/>
            
            <input type="submit" name="update" value="UPDATE DATA"/>
            
        </form>
    </center>
    </body>
</html>

<?php
    include 'connection.php';
    
    
    if(isset($_POST['update'])){

        $name =$_POST['txtName'];
        $surname = $_POST['txtSurname'];
        $cell = $_POST['txtContact'];
        $mail = $_POST['txtEmail'];
        $pass = $_POST['txtpasswrd'];
        $strName=$_POST['txtStreetName'];
        $ADcity=$_POST['txtCity'];
        $PlCode=$_POST['txtPostalCode'];
            
   

        $update = "UPDATE customer SET customer_f_name='$name',customer_l_name='$surname',customer_phone='$cell', 
            customer_email='$mail',customer_password='$pass' WHERE customer_id = '$id'";
        $sql_run = mysqli_query($conn,$update);
        
        $add ="UPDATE customer_address SET cust_add_postalcode ='$PlCode',cust_add_city='$ADcity',cust_street='$strName' WHERE customer_id= '$id'";
        $add_run = mysqli_query($conn,$add); 
        
        if($sql_run && $add_run)
        {
                  
            echo '<script type="text/javascript">alert("Data updated")</script>';
                  
        } else
            {
                echo '<script type="text/javascript">alert("Data not updated")</script>';
            }
    }
    
?>