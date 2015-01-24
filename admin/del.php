<?php 

$db_host = 'localhost';
$db_user = 'david';
$db_pwd = '';

$database = 'rsvp';
$table = 'event_rsvp';

$link = mysqli_connect($db_host, $db_user, $db_pwd);

$select_db = mysqli_select_db($link, "rsvp");



if(isset($_POST['delete']))
{
	
$del_id = $checkbox[$i];

$count=array();
$count=$_POST['checkbox'];
for($i=0;$i<count($count);$i++){
        $del_id = $checkbox['$i'];
        $sql = "DELETE FROM event_rsvp WHERE user_id='$del_id'";
        $result = mysql_query($sql);
}
$NEW="Selected records Deleted";
}
var_dump($_POST['checkbox']);
var_dump($count);
}

?>