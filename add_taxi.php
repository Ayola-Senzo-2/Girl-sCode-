<?php
    
    include('../database/dbConfig.php');
	
	
	if(isset($_POST['Add_TaxiBtn'])) {
		
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$phone = $_POST["cell"];
		$Taxi_model = $_POST["Taxi_model"];
		$taxiReg = $_POST["Taxi_Registration"];		
		
		$qry = "INSERT INTO taxi (taxiRegNo, taxiModel, taxiDriverId)
					VALUES ( '" . $taxiReg . "','" . $Taxi_model . "', (NULL));";

		$GLOBALS['conn']->query($qry);
		
		if(mysqli_affected_rows($GLOBALS['conn']) > 0) {
            echo("TAXI ADDED");  

			$qry2 = "INSERT INTO driver (driverName, driverSurname, driverPhone)
						VALUES ( '" . $name. "','" . $surname . "',	". $phone . ");";

			$GLOBALS['conn']->query($qry2);

			$sql3 = "SELECT taxiModel FROM taxi WHERE taxiModel = '$Taxi_model' ";
			$result = mysqli_query($conn,$sql3);

            if(mysqli_num_rows($result)>0){
                $rows = mysqli_fetch_assoc($result);
                $_SESSION["taxiModel"] = $rows['TaxiModel'];
                header("Location: add_taxi.php");        
            }else{
                echo "<script> alert('failed')</script>";
            }
			
			
			if(mysqli_affected_rows($GLOBALS['conn']) > 0) {
				echo("DRIVER ADDED");
				header("Location:add_passengers.php"); 
			}
			else {
				echo("FAILED TO ADD DRIVER (PLEASE ENTER CORRECT CELL PHONE NUMBER- MUST START WITH A 0 AND CONTAIN 10 NUMBERS)");             
			}				
        }
        else {
            echo("FAILED TO ADD TAXI");             
		}		
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Secure_Travelling</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="img/taxi.png">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
    
<!--Add_Driver-->
    <article id="Add_Driver">
		<h2 class="major">Add_Driver</h2>
		 	<form method="POST" action="">
				<div class="fields">
					<div class="field half">
						<label for="Name">Name</label>
						<input type="text" name="name" id="Name" required/>
					</div>
					<div class="field half">
						<label for="Surname">Surname</label>
						<input type="text" name="surname" id="Surname" required/>
					</div>
                	<div class="field half">
						<label for="Cell">Cell</label>
						<input type="text" name="cell" id="Cell" required/>
					</div>
				</div>
		
			
<!--Add_Taxi button-->
	<article id="Add_Taxi">
		<h2 class="major">Add_Taxi</h2>
			<div class="fields">
				<div class="half">
					<label for="Taxi_Registration">Taxi_Registration</label>
					<input type="text" name="Taxi_Registration" id="Taxi_Registration" required/>
				</div>
				<div class=" half">
					<label for="Taxi_model">Select taxi_model:</label>
				 	<input type="text" name="Taxi_model" id="Taxi_model" list = "taxiList"/>
					<datalist id = "taxiList">
						<option value = "QUANTUM "> 15 seater</option>
						<option value = "SIYAYA "> 15 seater</option>
						<option value = "IVECO ">22 seater </option>
					</datalist>
				</div>
				<div class=" half">
					<label for="Capacity">Capacity</label>
					<input type="text" onclick = "return taxicapacity(Taxi_model.value)" name="Capacity" id="Capacity" required/>
				</div>
				<div class="time">
					<label for="Loading_Time">Loading_Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Leaving_Time</label>
					<input style="color:#262a2c;" type="time" name="Loading_Time" id="Loading_Time" required/>
					<!-- <label for="Leaving_Time"></label> -->
					&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input style="color:#262a2c;" type="time" name="Leaving_Time" id="Leaving_Time" required/>
				</div>
				<div class="field half">
												
				</div>
				</div><br>
					<ul class="actions">
						<li><input type="submit" name="Add_TaxiBtn" value="Add_Taxi" class="primary" /></li>
					</ul>
		</article>
	</form>
</article>
			


<!--capacity-->
<script type="text/javascript">
function taxicapacity(Taxi_model){    
capacity = true;
if (Taxi_model == "QUANTUM" || Taxi_model == "SIAYAYA")
{
capacity = 15;
}
if (Taxi_model == "IVECO")
{
capacity = 22;
}
else{
	echo("invalid taxi model");
}

return capacity;
}
</script>
