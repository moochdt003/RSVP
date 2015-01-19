<?php 

$db_host = 'localhost';
$db_user = 'david';
$db_pwd = '';

$database = 'rsvp';
$table = 'event_rsvp';

$link = mysqli_connect($db_host, $db_user, $db_pwd);

$select_db = mysqli_select_db($link, "rsvp");

?>