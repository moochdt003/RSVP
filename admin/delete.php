<?php

session_start(); 

include_once('../includes/pdoConnect.php');
include_once('../includes/attendee.php');

$client = new Attendance;


if(isset($_SESSION['logged_in'])){
	if(isset($_POST['name'])){
		$name = $_GET['name'];


		$query = $pdo->prepare('DELETE FROM event_rsvp where name = ?');
		$query->bindValue(1,$name);
		$query->execute();

		header('Location:delete.php');

	}

$clients = $client->fetch_all();
//display delete page
?>
<html>
<head>
	<title>CMS first time</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	

</head>
<body>
	<?php include_once('../includes/navbar.php');?>

	<div class="container">
		
		
		<h2>Delete entry:</h2>

		<form action="delete.php" method="post">

			<select name="name">
				<!--option value=""></option-->
				<?php foreach ($clients as $client) {?>
					<option value="<?php echo $client['name'];?>">
					<?php echo $client['name'];  ?>
				</option>
				<?php }?>
				<input type='submit' Value='Delete Entry'>

		</form>


		</form>
			
	</div></div>

</body>
</html>

<?php
}else{

header('Location:index.php');

}

if(isset($_POST['checkbox'])){
$checkbox = $_POST['checkbox'];
$count = count($checkbox);


if (isset($_POST['delete'])) {
    $checkbox = $_POST['checkbox'];
    $count = count($checkbox);

    for($i = 0; $i < $count; $i++) {
        $id = (int) $checkbox[$i]; // Parse your value to integer

        if ($id > 0) { // and check if it's bigger then 0
            mysql_query("DELETE FROM table WHERE member_id = $id");
        }
    }
}
}

?>
