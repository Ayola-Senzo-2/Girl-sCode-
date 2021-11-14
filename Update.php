<!DOCTYPE html>
<<html>
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
            <input type="text" name="txtid" placeholder="Enter customer ID"/><br/>
            <input type="text" name="txtName" placeholder="Enter first name"/><br/>
            <input type="text" name="txtSurname" placeholder="Enter last surname"/><br/>
            <input type="text" name="txtContact" placeholder="Enter phone number"/><br/>
            <input type="text" name="txtEmail" placeholder="Enter email"/><br/>
            <input type="text" name="txtpasswrd" placeholder="Enter password"/><br/>
            <input type="submit" name="update" value="UPDATE DATA"/>
            
        </form>
    </center>
    </body>
</html>

<?php
    include 'connection.php';
    
    if(isset($_POST['update'])){
          
   
              //$id= $_POST['id'];
              $update = "UPDATE 'customer' SET customer_f_name = '$_POST[txtName]',customer_l_name= '$$_POST[txtSurname]',customer_phone = '$_POST[txtContact]',customer_password = '$_POST[txtpasswrd]',customer_email = '$_POST[txtEmail]' WHERE customer_id = '$_POST[txtid]' ";
              $sql_run = mysqli_query($conn,$update);
              
              if($sql_run)
              {
                  
                echo '<script type="text/javascript">alert("Data updated")</script>';
                  
              } else
              {
                  echo '<script type="text/javascript">alert("Data not updated")</script>';
              }
    }
?>