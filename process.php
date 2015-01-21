<html>

<head>
<title>Entering details</title>

<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/rsvp_js.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">


<style type="text/css">

tr td:first-child{

width:200px;

}
table{
font-size: 12px;
}

</style>




</head>
<body>
<div class="container">
<div class="header"><img class="header-img" src="images/header.jpg" alt="header"></div>
<div class="content">

<div class="inside">
	<h1>Thank you for your patience,</h1>

			<?php include 'includes/connect.php' ?>

			<?php
			if (isset($_POST["submit"])) {
			#creating variables from the form imputs
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
			$comments= $_POST['comments'];



			#running the insert command

			$retval = mysqli_query($link, "INSERT INTO event_rsvp (
															name,
															 ID,
															 attending,
															 attending_Partner,
															 partner_Details,
															 dietary,
															 dietary_Partner,
															 email,
															 telephone,
															 mobile,
															 address,
															 comments) 
													VALUES('$name', 
															'$ID',
															'$attending',
															'$attending_Partner',
															'$partner_Details',
															'$dietary',
															'$dietary_Partner',
															'$email',
															'$telephone',
															'$mobile',
															'$address',
															'$comments'												
															)");
				}

			if(! $retval )
			{
			  die('Could not enter data: ' . mysqli_error($link));

			}else
			{
				
			echo "<p>Your RSVP form was successfully submitted, Please do not hestitate to contact us if you would like to make changes to your RSVP details\n</p>";
			echo "<br>";
			mysqli_close($link);
			}


			?>

</div>
<div class="footer"><img class="footer-img" src="images/footer.jpg" alt="header"></div>




</div>	
</body>
</html>

<!--p> To view details <a href="result.php">click here</a></p-->