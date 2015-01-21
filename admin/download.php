<?php




			   try {
	include_once('../includes/pdoConnect.php');

	$tablename = 'event_rsvp';
/*
	$sql = 'SHOW COLUMNS FROM `'.$tablename.'`';
		
	$stmt = $pdo->query($sql);
	$stmt->execute();

	$fields = array($stmt);
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		array_push($fields, $row['Field']);
	}
		
	array_push($csv, $fields);*/

	$sql = 'SELECT * FROM `'.$tablename.'`';

	
	$stmt = $pdo->query($sql);
	$stmt->execute();
	
	$csv = array();
	
	while($row = $stmt->fetch(PDO::FETCH_NUM))
	{
		array_push($csv, $row);
	}
	
	$fp = fopen('file.csv', 'w');
	
	foreach ($csv as $row) {
		fputcsv($fp, $row);
	}
	
	fclose($fp);

	header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=rsvp-export.csv");
	header("Pragma: no-cache");
	header("Expires: 0");

	readfile('file.csv');

	$pdo = null;

} catch(PDOException $e) {
	echo $e->getMessage();
}


?>
