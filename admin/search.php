<?php
include_once('../includes/pdoConnect.php');
?>

<html>
	<head>
		<title>RSVP: Administration</title>
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="../js/rsvp_js.js"></script>
	
	<style type="text/css">

table{
width:100%;
font-size: 11px;
border: 0;
padding: 0;
border-spacing: 2;
}

table tr td{
    height:25px;
}

table tr.highlight td {
    background: #d0dafd;
}

#box-table-a th
{
    
    padding: 8px;
    background: #b9c9fe;
    border-top: 4px solid #aabcfe;
    border-bottom: 1px solid #fff;
    color: #039;
    cursor: pointer;
        font-size: 13px;
}


</style>



	</head>
		<body>
			<?php include_once('../includes/navbar.php');?>
			<div class="container">

<h2>Search results:</h2>

<form name="search" action="search.php" method="post">
    <div align="right" style="margin-right:10px;"><input type="text" name="name" />
    <input type="submit" name="Submit" value="Search" /></div>
</form>

<?php
echo "<table border='0' id='box-table-a'><tr>";
// printing table headers
echo "<thead>";

    echo "<th><input type='checkbox' name='select' value='selected' class='checkbox_check' /></th>
           
          <th>Name</th>
          <th>ID/Passport</th>
          <th>Attending</th>
          <th>Partner</br>Attending</th>
          <th>Partner</br>Details</th>
          <th>Dietary</th>
          <th>Partner<br>Dietary</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Mobile</th>
          <th>Address</th>
          <th>Comments</th>";

echo "</tr>\n";
echo "</thead>";
echo "<tbody>";
if (isset($_POST['name'])) {

$searchQ = $_POST['name'];

$query = $pdo->prepare("SELECT * FROM event_rsvp WHERE name = ?");
$query->bindValue(1,$searchQ);
$query->execute();  



if (!$query->rowCount() == 0) {
    while ($results = $query->fetch()) {
        echo "<tr class='normal' id='0'>
        			<td class='has_cb'><input type='checkbox' name='select' value='checked'/></td>
        			<td>", $results['name'], "</td>
        			<td>", $results['ID'],"</td>
        			<td>", $results['attending'], "</td>
        			<td>", $results['attending_Partner'], "</td>
        			<td>", $results['partner_Details'], "</td>
        			<td>", $results['dietary'], "</td>
        			<td>", $results['dietary_Partner'], "</td>
        			<td>", $results['email'],"</td>
        			<td>", $results['telephone'], "</td>
        			<td>", $results['mobile'], "</td>
        			<td>", $results['address'],"</td>
        			<td>", $results['comments'], "</td>
        	</tr>";
    }
} else {
    echo "<span style='font-size:12px; color:red; margin-left:10px; font-weight:bold;'>Entry was not found. Please make sure you have typed in the name correctly</span>";
}
}
?>
</table>


</div></div>
</body>
	</html>