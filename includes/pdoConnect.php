<?php

	try{
	$pdo = new PDO('mysql:host=localhost;dbname=rsvp','david','');
}catch(PDOException $e){
	exit('Database error');
}
?>