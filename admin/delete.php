<?php

session_start(); 

include_once('../includes/pdoConnect.php');
include_once('../includes/attendee.php');

$client = new Attendance;

if(isset($_SESSION['logged_in'])){
	if(isset($_GET['name'])){
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="container">
		
		<a href="../index.php" id="logo">CMS</a>
		<br><br>
		<h4>Select the article to delete :</h4>
		<form action="delete.php" method="get">

			<select onchange="this.form.submit();" name="name">
				<!--option value=""></option-->
				<?php foreach ($clients as $client) {?>
					<option value="<?php echo $client['name'];?>">
					<?php /*echo $article['article_title']; */ ?>
				</option>
				<?php }?>


		</form>


		</form>
			
	</div>

</body>
</html>

<?php
}else{

header('Location:index.php');

}



?>
