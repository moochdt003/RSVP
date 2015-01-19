
<?php

	try{
	$pdo = new PDO('mysql:host=localhost;dbname=rsvp','david','');
}catch(PDOException $e){
	exit('Database error');
}
?>



<script type="text/javascript">

function ID(){

prompt("what is the number",'number')

}


</script>

<?php 
if(isset($_GET['id'])){
		$id = $_GET['id'];
//$id = $_POST['id'];


$query = $pdo->prepare('DELETE FROM event_rsvp where user_ID = ?');
$query->bindValue(1,$id);

$query->execute();
echo "successfully deleted";
}else{
	echo "Not deleted";
}


  

?>
<form method="get" action="delete.php">

<input type="text" name="id" placeholder="enter ID">
<input type="submit" value="Delete">

</form>