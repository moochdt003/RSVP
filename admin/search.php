<?php
include_once('../includes/pdoConnect.php');
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

<?php
$searchQ = $_POST['name'];

$query = $pdo->prepare("SELECT * FROM event_rsvp WHERE name = ?");
$query->bindValue(1,$searchQ);
$query->execute();  

echo "<table id='box-table-a' width='400'><thead><th>Select</th><th>Name</th><th>ID</th><th>Attending</th></thead>";
if (!$query->rowCount() == 0) {
    while ($results = $query->fetch()) {
        echo "<tr class='normal' id='0'><td class='has_cb'><input type='checkbox' name='select' value='checked'/></td><td>", $results['name'], "</td><td>", $results['ID'],"</td><td>", $results['attending'], "</td></tr>";
    }
} else {
    echo 'Nothing found';
}

?>
</table>

<form name="search" action="search.php" method="post">
    <div align="center"><input type="text" name="name" />
    <p><input type="submit" name="Submit" value="Search" /></p>
</form>

</div>
</body>
	</html>