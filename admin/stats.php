<?php
include_once('../includes/connect.php');
?>

<html>
	<head>
		<title>RSVP: Statistics</title>
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<script type="text/javascript" src="../js/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="../js/rsvp_js.js"></script>
	
	<style type="text/css">

table{
width:30%;
font-size: 11px;
border: 0;
padding: 0;
border-spacing: 2;
}

table tr td{
    height:25px;
    text-align: center;
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



	</head>
		<body>
			<?php include_once('../includes/navbar.php');?>
			<div class="container">



<h2>Statistics:</h2>

<div class='stats'>


<?php

mysqli_real_query($link, "select count(*) from event_rsvp");

$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);




echo"<h3>Attendence:</h3>";
echo "<table border='0' id='box-table-a'><tr><thead>

				<th>Responses</th>
				<th>Total attending</th>
				<th>Not attending</th>
				</thead></tr>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
       echo "<tr class='normal' id='0' >";
        echo "<td>$cell</td>";
}
mysqli_free_result($result);
?>

<?php

mysqli_real_query($link, "select(select count(attending) as attendence from event_rsvp where attending = 'Yes')+
                            (select count(attending_Partner) as attendence from event_rsvp where attending_Partner = 'Yes')AS SumCount");


$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);

//echo "<h1>Table: {$table}</h1>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)

        echo "<td>$cell</td>";

    
}
mysqli_free_result($result);
?>

<?php

mysqli_real_query($link, "select count(attending) as attendence from event_rsvp where attending = 'No'");

$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);

//echo "<h1>Table: {$table}</h1>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)

        echo "<td>$cell</td>";

    echo "</tr></table>";
}
mysqli_free_result($result);
?>







<?php



mysqli_real_query($link, "select(select count(dietary) as diet from event_rsvp where dietary = 'Standard')+(select count(dietary_Partner) as diet from event_rsvp where dietary_Partner = 'Standard')AS SumCount");

$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);

echo"<h3>Dietary:</h3>";
echo "<table border='0' id='box-table-a'><tr><thead>

				<th>Standard</th>
				<th>Halaal</th>
				<th>Vegetarian</th>
				</thead></tr>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
       echo "<tr class='normal' id='0' >";
        echo "<td>$cell</td>";
}
mysqli_free_result($result);
?>

<?php

mysqli_real_query($link, "select(select count(dietary) as diet from event_rsvp where dietary = 'Halaal')+(select count(dietary_Partner) as diet from event_rsvp where dietary_Partner = 'Halaal')AS SumCount");

$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);

//echo "<h1>Table: {$table}</h1>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)

        echo "<td>$cell</td>";

    
}
mysqli_free_result($result);
?>

<?php

mysqli_real_query($link, "select(select count(dietary) as diet from event_rsvp where dietary = 'Vegetarian')+(select count(dietary_Partner) as diet from event_rsvp where dietary_Partner = 'Vegetarian')AS SumCount");

$result = mysqli_store_result($link);

$fields_num = mysqli_num_fields($result);

//echo "<h1>Table: {$table}</h1>";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)

        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysqli_free_result($result);
?>
</div>



</div></div>
</body>
	</html>