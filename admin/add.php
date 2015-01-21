

<?php

session_start();
include_once('../includes/pdoConnect.php');

if(isset($_SESSION['logged_in'])){


	if(isset($_POST['name'],$_POST['ID'],$_POST['attendingBool'],$_POST['attending_PartnerBool'],$_POST['partner_Details'],$_POST['dietarySelect'],
	 $_POST['dietary_PartnerSelect'], $_POST['email'], $_POST['telephone'],$_POST['mobile'], $_POST['address'], $_POST['comments'])){
		
			$name = $_POST['name'];
			$ID = $_POST['ID'];
			$attending = $_POST['attendingBool'];
			$attending_Partner = $_POST['attending_PartnerBool'];
			$partner_Details = $_POST['partner_Details'];
			$dietary = $_POST['dietarySelect'];
			$dietary_Partner = $_POST['dietary_PartnerSelect'];
			$email = $_POST['email'];
			$telephone= $_POST['telephone'];
			$mobile= $_POST['mobile'];
			$address= $_POST['address'];
			$comments= nl2br($_POST['comments']);


		if(empty($name) || empty($ID) || empty($attending)){
			$error = "All fields are required";

		}else{

			$query = $pdo->prepare('INSERT INTO event_rsvp (name,ID,attending,attending_Partner,partner_Details, dietary,dietary_Partner,email,telephone,mobile,address,comments)
									values (?,?,?,?,?,?,?,?,?,?,?,?)');
			$query->bindValue(1,$name);
			$query->bindValue(2,$ID);
			$query->bindValue(3,$attending);
			$query->bindValue(4,$attending_Partner);
			$query->bindValue(5,$partner_Details);
			$query->bindValue(6,$dietary);
			$query->bindValue(7,$dietary_Partner);
			$query->bindValue(8,$email);
			$query->bindValue(9,$telephone);
			$query->bindValue(10,$mobile);
			$query->bindValue(11,$address);
			$query->bindValue(12,$comments);
			$query->execute();



			header('Location:result.php');
		}


	}
?>

<html>
	<head>
		<title>RSVP: Administration</title>
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="../js/rsvp_js.js"></script>
	</head>
		<body>
			<?php include_once('../includes/navbar.php');?>

			<div class="container">
				
				
				<h2>Add entry:</h2>
			
				<?php if(isset($error)) { ?>

						<small style ="color:F00;";><?php echo $error;?></small>
						<br><br><?php 
					} 
					?>

			
				
		<!--p>Please enter your details:</p-->

				<form method="post" action="add.php" autocomplete="off" onsubmit="return(validate());" >
					<div class="insideAdd" style="background-color: #b9c9fe;">
					<table class="adminView">
						<tr>
							<td>Full name:</td>
							<td><input type="text" name="name" id="name"> </td>
						</tr>
						<tr>
							<td>ID :</td>
							<td><input type="text" name="ID" id="ID"></td>
						</tr>
						<tr>
							<td>Will you be attending:</td>
							<td>	<select name="attendingBool" id="attending" onchange="attendingEvent();">
								 		<option value=""> - </option>
									  	<option value="Yes">Yes</option>
									  	<option value="No">No</option>
								 	</select>
							</td>
						</tr>
					</table>
					<table id="attendingDetails" class="adminView">	
						<tr>
							<td>Attending with partner:</td>
							<td><select name="attending_PartnerBool" id="attending_Partner" onchange="partner();">
										<option value=""> - </option>	
									 	<option value="Yes">Yes</option>
									  	<option value="No">No</option>
								</select>
							</td>
						</tr>
						<tr id="partnerName" >
							<td>Partner's full name:</td>
							<td><input type="text" name="partner_Details" id="partner_Details"></td>
						</tr>
						
						<!--tr><td>No i will not be attending :</td>
							<td><input type="text" name="not_Attending" id="not_Attending"></td>
						</tr-->
						
						<tr>
							<td>Dietary requirements :</td>
							<td>
								<select name="dietarySelect" id="dietary">
									  <option value=""> - </option>
									  <option value="Standard">Standard</option>
									  <option value="Vegetarian">Vegetarian</option>
									  <option value="Halaal">Halaal</option>
								 </select>
							</td>
						</tr>
						<tr id="partnerDiet"><td>Partners dietary requirements :</td>
							<td>
								<select name="dietary_PartnerSelect" id="dietary_Partner">
									  <option value=""> - </option>
									  <option value="Standard">Standard</option>
									  <option value="Vegetarian">Vegetarian</option>
									  <option value="Halaal">Halaal</option>
								 </select>
							</td>
						</tr>
						
						<tr>
							<td>Telephone :</td>
							<td><input type="text" name="telephone" id="telephone" onblur="formatPhone(this);"></td>
						</tr>
					
						<tr>
							<td>Mobile :</td>
							<td><input type="text" name="mobile" id="mobile" onblur="formatPhone(this);"></td>
						</tr>
						<tr>
							<td>Email address :</td>
							<td><input type="text" name="email" id="email"></td>
						</tr>
						
						<tr>
							<td>Address :</td>
							<td><input type="text" name="address" id="address"></td>
						</tr>
					</table>	
					<table class="adminView">	
						<tr>
							<td valign="top">Additional Comments :</td>
							<td><textarea rows="4" cols="22" name="comments" id="comments"></textarea></td>
						</tr>

						<tr>
							<td></td>
							<td><input type="submit" id="submit" name="submit" value="Add new attendee" ></td>
						</tr>
					</table>
				
					</div>
				</form>
					
			</div></div>

		</body>
</html>


<?php
}else{

	header('Location: index.php');
}


?>