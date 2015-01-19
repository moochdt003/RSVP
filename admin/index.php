
<?php

session_start(); 

include_once('../includes/pdoConnect.php');

if(isset($_SESSION['logged_in'])){
?>



<html>
<head>
	<title>RSVP system</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="container">
		
		<a href="../admin/index.php" id="logo">RSVP</a>
		<br>

		<ol>
			<li><a href="result.php">View RSVP log sheet</a></li>
			<li><a href="add.php">Add attendee</a></li>
			<li><a href="delete.php">Delete attendee</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ol>
			
	</div>

</body>
</html>
<?php
}else{

//display login
	if(isset($_POST['username'],$_POST['password'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if(empty($username) or empty($password)){

		$error = 'All fields are required!';

	}else{

		$query = $pdo->prepare('SELECT * FROM users  where user_name =? AND user_password = ?');

		$query->bindValue(1, $username);
		$query->bindValue(2,$password);
		$query->execute();

		$num = $query->rowCount();

		if($num == 1){

			//user entered correct details
			$_SESSION['logged_in'] = true;
			header('Location:index.php');
			exit();
		}else{

			//user entered false details
			$error = 'Incorrect username or password';
			}
		}
	}



?>

<html>
<head>
	<title>RSVP system</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="container">
		
		<a href="../admin/index.php" id="logo">RSVP</a>
		<br><br>
		<?php if(isset($error)) { ?>

				<small style ="color:F00;";><?php echo $error;?></small>
				<br><br><?php 
			} ?>

			<form action="index.php" method="post" autocomplete="off">

				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<input type="submit" value="Login">


			</form>
	</div>

</body>
</html>


<?php
}


?>