<?php

session_start(); 

include_once('../includes/connect.php');

if(isset($_SESSION['logged_in'])){
?>



<html>

<head>

<title>MySQL Table Viewer</title>


<style type="text/css">

table{

border: 1;
padding: 0;
border-spacing: 0;
}

</style>
</head>


<body>




<!--button name="Delete" value="Delete" type="button" onclick="ID();">Delete</button-->





<?php
if (!$link)
    die("Can't connect to database");

if (!$select_db)
    die("Can't select database");

// sending query
//mysqli_query($link,"SELECT * FROM marks");
/*if (!$result) {
    die("Query to show fields from table failed");
}*/

mysqli_real_query($link, "SELECT * FROM event_rsvp");

$result = mysqli_store_result($link);



$fields_num = mysqli_num_fields($result);

echo "<h1>Table: {$table}</h1>";
echo "<table border='1'><tr>";
// printing table headers
echo "<thead>";
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($result);
    echo "<th>{$field->name}</th>";
}
echo "</tr>\n";
echo "</thead>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysqli_free_result($result);
?>

<p> To return to Admin menu <a href="index.php">click here</a></p>

</body></html>
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