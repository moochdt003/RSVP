<?php

class Attendance{


public function fetch_all(){

		global $pdo;
		$query = $pdo->prepare("SELECT * FROM event_rsvp");
		$query->execute();

		return $query->fetchAll();

	}


public function fetch_data($name){

		global $pdo;
		$query = $pdo->prepare('SELECT * FROM event_rsvp WHERE name=?');
		$query->bindValue(1,$name);
		$query->execute();

		return $query->fetch();

	}

}

		


?>