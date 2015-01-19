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
<div class="header"><img class="header-img" src="images/header.jpg"  width="580px" alt="header"></div>
<div class="content">

<div class="inside">
	<h1>Please enter your details:</h1>


<!--p>Please enter your details:</p-->

<form method="post" action="process.php" name="testForm" onsubmit="return(validate());" >
	<table>
		<tr><td>Full name:</td>
			<td><input type="text" name="name" id="name"> </td>
		</tr>
		<tr><td>ID :</td>
			<td><input type="text" name="ID" id="ID"></td>
		</tr>
		
		<tr><td>Will you be attending:</td>
			<td>	<select name="attendingBool" id="attending" onchange="attendingEvent();">
				 		<option value=""> - </option>
					  <option value="Yes">Yes</option>
					  <option value="No">No</option>
				  </select>
			</td>
		</tr>
	</table>
	<table id="attendingDetails">	
		<tr><td>Attending with partner:</td>
			<td><select name="attending_PartnerBool" id="attending_Partner" onchange="partner();">
						<option value=""> - </option>	
					  <option value="Yes">Yes</option>
					  <option value="No">No</option>
				</select>
				</td>
		</tr>
		<tr id="partnerName" ><td>Partner's full name:</td>
			<td><input type="text" name="partner_Details" id="partner_Details"></td>
		</tr>
		
		<!--tr><td>No i will not be attending :</td>
			<td><input type="text" name="not_Attending" id="not_Attending"></td>
		</tr-->
		
		<tr><td>Dietary requirements :</td>
			<td><select name="dietarySelect" id="dietary">
					<option value=""> - </option>
				  <option value="Standard">Standard</option>
				  <option value="Vegetarian">Vegetarian</option>
				  <option value="Halaal">Halaal</option>
				 </select>
			</td>
		</tr>
		<tr id="partnerDiet"><td>Partners dietary requirements :</td>
			<td><select name="dietary_PartnerSelect" id="dietary_Partner">
				<option value=""> - </option>
				  <option value="Standard">Standard</option>
				  <option value="Vegetarian">Vegetarian</option>
				  <option value="Halaal">Halaal</option>
				 </select></td>
		</tr>
		
		<tr><td>Telephone :</td>
			<td><input type="text" name="telephone" id="telephone" onblur="formatPhone(this);"></td>
		</tr>
	
		<tr><td>Mobile :</td>
			<td><input type="text" name="mobile" id="mobile" onblur="formatPhone(this);"></td>
		</tr>
		<tr><td>Email address :</td>
			<td><input type="text" name="email" id="email"></td>
		</tr>
		
		<tr><td>Address :</td>
			<td><input type="text" name="address" id="address"></td>
		</tr>
	</table>	
	<table>	
		<tr><td valign="top">Additional Comments :</td>
			<td><textarea rows="4" cols="22" name="comments" id="comments"></textarea></td>
		</tr>

		<tr><td></td>
			<td><input type="submit" id="submit" name="submit" value="submit" ></td>
		</tr>
	</table>

</form>

</div>

</div>
<div class="footer"><img class="footer-img" width="580px" src="images/footer.jpg" alt="header"></div>

</div>	
</body>
</html>