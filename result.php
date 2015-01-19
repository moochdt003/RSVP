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
<?php include 'common/connect.php' ?>



<button name="Delete" value="Delete" type="button" onclick="ID();">Delete</button>





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

<p> To return to form <a href="form.php">click here</a></p>

</body></html>