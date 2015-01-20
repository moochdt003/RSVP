<?php

session_start(); 

include_once('../includes/connect.php');

if(isset($_SESSION['logged_in'])){
?>



<html>

<head>

<title>RSVP: Log sheet</title>
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<!--link rel="stylesheet" type="text/css" href="../css/styles.css"-->
<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="../js/rsvp_js.js"></script>
    </head>

<style type="text/css">

table{
width:100%;
font-size: 11px;
border: 0;
padding: 0;
border-spacing: 2;
}

table tr td{
    height:25px;
}

table tr.highlight td {
    background: #d0dafd;
}

#box-table-a th
{
    
    padding: 8px;
    background: #b9c9fe;
    border-top: 4px solid #aabcfe;
    border-bottom: 1px solid #fff;
    color: #039;
    cursor: pointer;
}


</style>

<script type="text/javascript">
//hides primary key row from result log sheet
$(document).ready(function() {
   
$('td:nth-child(2)').hide();


$('#selectAll').toggle(function(){
    alert('me');
        $('#box-table-a tbody>tr input:checkbox').attr('checked','checked');
        $('#hidden').removeAttr('checked');
    },function(){
        $('#box-table-a tbody>tr input:checkbox').removeAttr('checked');       
    });

});

</script>


</head>


<body>

<?php include_once('../includes/navbar.php');?>



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
echo "<table border='0' id='box-table-a'><tr>";
// printing table headers
echo "<thead>";

    echo "<th><input type='checkbox' name='select' value='selected' class='checkbox_check' /></th>
           
          <th>Name</th>
          <th>ID/Passport</th>
          <th>Attending</th>
          <th>Partner</br>Attening</th>
          <th>Partner</br>Details</th>
          <th>Dietary</th>
          <th>Dietary</br>Partner</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Mobile</th>
          <th>Address</th>
          <th>Comments</th>";

echo "</tr>\n";
echo "</thead>";
echo "<tbody>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    echo "<tr class='normal' id='0' >";
         echo   "<td class='has_cb'><input type='checkbox' name='select' value='checked'/></td>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysqli_free_result($result);
?>
<?php

echo "</tbody></table>";


?>

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