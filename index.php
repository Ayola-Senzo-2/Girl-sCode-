<?php
namespace Phppot;
use Phppot\departingRank;
require_once __DIR__ . '/Model/departingArea.php';
$rank = new departingRank();
$rankResult = $rank->getAllRank();
?>

<?php
	
	session_start();
	include('../database/dbConfig.php');
	 	
  if(isset($_SESSION['admin'])){
    	header('location: addTrip.php');
  	}

    if(isset($_SESSION['passenger'])){
      header('location: Available Taxis.php .php');
    }
	
	

	if(isset($_POST['login'])){
		$cell = $_POST['cell'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE mobileNumber = '$cell' AND userRole='Admin'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with this mobile number';
		}
		else{
			$row = $query->fetch_assoc();
			//if(password_verify($password, $row['password'])){
			 if($password==$row['password']){
				$_SESSION['admin'] = $row['userID'];
				header('location: addTrip.php');

			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');



?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Secure_Travelling</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="assets/css/bg.jpg">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-preload">

<!-- Wrapper -->
	<div id="wrapper">
<!-- Header -->
   <header id="header">
		<div class="logo">
			<span class="icon fa-gem"></span>
		</div>
		<div class="content">
			<div class="inner">
				<h1>Secure_Travelling <br> Uhambo oluphephile</h1>
				<p>Your Lives In Our Hands</p>
			</div>
		</div>
	    <nav>
	        <ul>
			    <li><a href="sign-in.php">Admin</a></li>
			    <li><a href="#Add_Trip">Add_Trip</a></li>
			    <!--<li><a href="#elements">Elements</a></li>-->
		    </ul>
		</nav>
    </header>

	<!-- Main -->
	<div id="main">
	<!-- Work --
	<article id="Admin">
		<h2 class="major">Admin</h2>
		<form method="post" action="sign_in.php">
		   <div class="fields">
				<div class="field">
			        <label for="cell">Cell</label>
					<input type="text" name="cell" id="cell" required/>
				</div>
			    <div class="field">
			         <label for="name">Password</label>
				     <input type="password" name="password" id="password" required/>
			    </div>
	        </div>							
		    <ul class="actions">
			    <li><input type="submit" name="login" value="Sign In" class="primary" /></li>											
		    </ul>
	    </form>		
		<a class="primary" href="sign_up.php" >Sign Up</a>				
	    <!-- <form method="post" action="sign_up.php">
			<li><input type="submit" name="signUpBtn" value="Sign Up" class="primary" /></li>
		</form> -->
	</article>

<!--POP MESSAGE-->				
<script type="text/javascript">
function validate(Departure, Destination)
{x = true;
if (Departure == Destination)
{
    alert ("Departure cannot be the same as destination");
    x = false;
    
}
return x;
}

</script>
								
	<!--Add_Trip button-->

	<article id="Add_Trip">
		<h2 class="major">Add_Trip</h2>
		<form action= "Available Taxis.php" method=POST onsubmit = "return validate(Departure.value, Destination.value)">
				<label for="Departure">Enter departure rank:</label>
				<input type="text" name="Departure" id="Departure" list = "departureList"/>
				<datalist id = "departureList">
					<option value = "Wanderers, Johannesburg">Wanderers </option>
					<option value = "Enkomeni, Johannesburg">Enkomeni </option>
					<option value = "Oakmoor, Johannesburg">Oakmoor </option>
					<option value = "JHB North-West, Johannesburg">JHB North-West </option>
					<option value = "Marabastad, Pretoria ">Marabastad </option>
					<option value = "Soshanguve, Pretoria ">Soshanguve </option>
					<option value = "Mamelodi, Pretoria ">Mamelodi </option>
					<option value = "Indian-Centre, Polokwane ">Indian-Centre </option>
					<option value = "City-Centre, Polokwane ">City-Centre </option>
					<option value = "Long-Distance, Witbank">Long-Distance </option>
					<option value = "Sisonke Long-Distance, eThekwini ">Sisonke Long-Distance </option>
					<option value = "Umgeni, eThekwini ">Umgeni </option>
 				</datalist>

				<!-- <label for="Destination">Enter destination rank:</label>
				 <input type="text" name="Destination" id="Destination" list = "destinationList"/>
				<datalist id = "destinationList">
					<option value = "Wanderers, Johannesburg">Wanderers </option>
					<option value = "Enkomeni, Johannesburg">Enkomeni </option>
					<option value = "Oakmoor, Johannesburg">Oakmoor </option>
					<option value = "JHB North-West, Johannesburg">JHB North-West </option>
					<option value = "Marabastad, Pretoria ">Marabastad </option>
					<option value = "Soshanguve, Pretoria ">Soshanguve </option>
					<option value = "Mamelodi, Pretoria ">Mamelodi </option>
					<option value = "Indian-Centre, Polokwane ">Indian-Centre </option>
					<option value = "City-Centre, Polokwane ">City-Centre </option>
					<option value = "Long-Distance, Witbank">Long-Distance </option>
					<option value = "Sisonke Long-Distance, eThekwini ">Sisonke Long-Distance </option>
					<option value = "Umgeni, eThekwini ">Umgeni </option>
 				</datalist><br> -->

 <div class="row">
            <label>Province:</label><br /> <select name="province"
                id="rank-list" class="demoInputBox"
                onChange="getDestination(this.value);">
								<!--<option value disabled selected>Select Province</option> -->
				<?php
				foreach $rankResult as $rank) {
					?>
				<option value="<?php echo $rank["rankID"]; ?>"><?php echo $rank["rankName"]; ?></option>
				<?php
				}
				?>
				</select>
						</div>
						<div class="row">
							<label>District:</label><br /> <select name="district"
								id="destination-list" class="demoInputBox>
								<!--<option value="">Select District</option>-->
							</select>
						</div>








				 <form method="post" action=" ">
				<ul class="actions">
					<li><input type="submit" name="Add_TripBtn" value="Add_Trip" class="primary" /></li>
				</ul>
				</form>
				</div>
        	</form><br>
    </article>


				
								
									<!--<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									
									</ul> 
								</article>

							 Elements 
								<article id="elements">
									<h2 class="major">Elements</h2>

									<section>
										<h3 class="major">Text</h3>
										<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
										This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
										This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
										<hr />
										<h2>Heading Level 2</h2>
										<h3>Heading Level 3</h3>
										<h4>Heading Level 4</h4>
										<h5>Heading Level 5</h5>
										<h6>Heading Level 6</h6>
										<hr />
										<h4>Blockquote</h4>
										<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
										<h4>Preformatted</h4>
										<pre><code>i = 0;

	while (!deck.isInOrder()) {
		print 'Iteration ' + i;
		deck.shuffle();
		i++;
	}

	print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
									</section>

									<section>
										<h3 class="major">Lists</h3>

										<h4>Unordered</h4>
										<ul>
											<li>Dolor pulvinar etiam.</li>
											<li>Sagittis adipiscing.</li>
											<li>Felis enim feugiat.</li>
										</ul>

										<h4>Alternate</h4>
										<ul class="alt">
											<li>Dolor pulvinar etiam.</li>
											<li>Sagittis adipiscing.</li>
											<li>Felis enim feugiat.</li>
										</ul>

										<h4>Ordered</h4>
										<ol>
											<li>Dolor pulvinar etiam.</li>
											<li>Etiam vel felis viverra.</li>
											<li>Felis enim feugiat.</li>
											<li>Dolor pulvinar etiam.</li>
											<li>Etiam vel felis lorem.</li>
											<li>Felis enim et feugiat.</li>
										</ol>
										<h4>Icons</h4>
										<ul class="icons">
											<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
										</ul>

										<h4>Actions</h4>
										<ul class="actions">
											<li><a href="#" class="button primary">Default</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
										<ul class="actions stacked">
											<li><a href="#" class="button primary">Default</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
									</section>

									<section>
										<h3 class="major">Table</h3>
										<h4>Default</h4>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Name</th>
														<th>Description</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Item One</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Two</td>
														<td>Vis ac commodo adipiscing arcu aliquet.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Three</td>
														<td> Morbi faucibus arcu accumsan lorem.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Four</td>
														<td>Vitae integer tempus condimentum.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Five</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
										</div>

										<h4>Alternate</h4>
										<div class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Name</th>
														<th>Description</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Item One</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Two</td>
														<td>Vis ac commodo adipiscing arcu aliquet.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Three</td>
														<td> Morbi faucibus arcu accumsan lorem.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Four</td>
														<td>Vitae integer tempus condimentum.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Five</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</section>

									<section>
										<h3 class="major">Buttons</h3>
										<ul class="actions">
											<li><a href="#" class="button primary">Primary</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
										<ul class="actions">
											<li><a href="#" class="button">Default</a></li>
											<li><a href="#" class="button small">Small</a></li>
										</ul>
										<ul class="actions">
											<li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
											<li><a href="#" class="button icon solid fa-download">Icon</a></li>
										</ul>
										<ul class="actions">
											<li><span class="button primary disabled">Disabled</span></li>
											<li><span class="button disabled">Disabled</span></li>
										</ul>
									</section>

									<section>
										<h3 class="major">Form</h3>
										<form method="post" action="#">
											<div class="fields">
												<div class="field half">
													<label for="demo-name">Name</label>
													<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
												</div>
												<div class="field half">
													<label for="demo-email">Email</label>
													<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
												</div>
												<div class="field">
													<label for="demo-category">Category</label>
													<select name="demo-category" id="demo-category">
														<option value="">-</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
												<div class="field half">
													<input type="radio" id="demo-priority-low" name="demo-priority" checked>
													<label for="demo-priority-low">Low</label>
												</div>
												<div class="field half">
													<input type="radio" id="demo-priority-high" name="demo-priority">
													<label for="demo-priority-high">High</label>
												</div>
												<div class="field half">
													<input type="checkbox" id="demo-copy" name="demo-copy">
													<label for="demo-copy">Email me a copy</label>
												</div>
												<div class="field half">
													<input type="checkbox" id="demo-human" name="demo-human" checked>
													<label for="demo-human">Not a robot</label>
												</div>
												<div class="field">
													<label for="demo-message">Message</label>
													<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</form>
									</section>

								</article>

						</div>

					Footer -->
						<footer id="footer">
							<p class="copyright">All rights reserved &copy; Secure_Travelling 2021.</p>
						</footer>

				</div>

			<!-- BG -->
				<div id="bg"></div>

			<!-- Scripts -->
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/js/browser.min.js"></script>
				<script src="assets/js/breakpoints.min.js"></script>
				<script src="assets/js/util.js"></script>
				<script src="assets/js/main.js"></script>

		</body>
	</html>
