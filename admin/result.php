<?php
session_start(); 
include_once('../includes/connect.php');
if(isset($_SESSION['logged_in'])){
?>



<html>

<head>

<title>RSVP: Log sheet</title>
<link rel="stylesheet" type="text/css" href="../css/admin.css">
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
    font-size: 13px;

}


</style>

<script type="text/javascript">
//hides primary key row from result log sheet
$(document).ready(function() {
   
$('td:nth-child(2)').hide();
$('td:nth-child(1)').hide();


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
<div class="container">


<!--button name="Delete" value="Delete" type="button" onclick="ID();">Delete</button-->

<form name="search" action="search.php" method="post">
    <div align="right" style="margin-right:10px;"><input type="text" name="name" />
    <input type="submit" name="Submit" value="Search" /></div>
</form>

<!--form name="delete" action="del.php" method="post">
    <input type="submit" name="delete" value="delete" />
</form-->


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

//echo "<h1>Table: {$table}</h1>";
echo "<table border='0' id='box-table-a'><tr>";
// printing table headers
echo "<thead>";

    echo "<!--th><input type='checkbox' name='select' value='selected' class='checkbox_check' /></th-->
          <th valign='top'>Name</th>
          <th valign='top'>ID/Passport</th>
          <th valign='top'>Attending</th>
          <th valign='top'>Partner</br>Attending</th>
          <th valign='top'>Partner</br>Details</th>
          <th valign='top'>Dietary</th>
          <th valign='top'>Partner</br>Dietary</th>
          <th valign='top'>Email</th>
          <th valign='top'>Telephone</th>
          <th valign='top'>Mobile</th>
          <th valign='top'>Address</th>
          <th valign='top'>Comments</th>";

echo "</tr>\n";
echo "</thead>";
echo "<tbody>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    echo "<tr class='normal' id='0' >";
         echo   "<td class='has_cb'><input type='checkbox' name='checkbox' value='checkbox'/></td>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>&nbsp;&nbsp;$cell</td>";

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
<?php
header('Location: index.php');


}


?>