<?php
    
    include('../database/dbConfig.php');
	
	
	if(isset($_POST['Add_TaxiBtn'])) {
		
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$phone = $_POST["cell"];
		$Taxi_model = $_POST["Taxi_model"];
		$taxiReg = $_POST["Taxi_Registration"];		
		
		$qry = "INSERT INTO taxi (taxiRegNo, taxiModel, taxiOwnerId, taxiDriverId)
						VALUES ( '" . $taxiReg . "','" . $Taxi_model . "', (NULL), (NULL));";

		$GLOBALS['conn']->query($qry);
		
		if(mysqli_affected_rows($GLOBALS['conn']) > 0) {
            echo("TAXI ADDED");  

			$qry2 = "INSERT INTO driver (driverName, driverSurname, driverPhone)
							VALUES ( '" . $name. "','" . $surname . "',	". $phone . ");";

			$GLOBALS['conn']->query($qry2);
			
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
    
   
		<div id="wrapper">

			<article id="Add_Taxi">
					<h2 class="major">Add Trip</h2>
						<div class="fields">
							<div class="field">
								<label for="Taxi_Registration">Taxi_Registration</label>
								<input type="text" name="Taxi_Registration" id="Taxi_Registration" required/>
							</div>
							<!--<div class="field half">
								<label for="Taxi_model">Select taxi_model:</label>
				 				<input type="text" name="Taxi_model" id="Taxi_model" list = "taxiList"/>
								<datalist id = "taxiList">
									<option value = "QUANTUM "> 15 seater</option>
									<option value = "SIYAYA "> 15 seater</option>
									<option value = "IVECO ">22 seater </option>
								</datalist>
							</div> -->
							<div class="field">
							<div class="time">
								<label for="Loading_Time">Depature Time</label>
								<input style="color:#262a2c;" type="time" name="Loading_Time" id="Loading_Time" required/>
							</div>
							</div>     
							
							
						</div><br>
					<ul class="actions">
						<li><input type="submit" name="Add_TaxiBtn" value="Add Trip" class="primary" /></li>
					</ul>
			  </article>
			
		</form>
	</article>
 </div>
