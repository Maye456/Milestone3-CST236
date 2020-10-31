<?php 
// Expects an array of persons. Display results in table
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<head>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
			integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<style>
#customers {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#customers td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#customers tr:nth-child(even){
background-color: #f2f2f2;
}
#customers tr:hover {
background-color: #ddd;
}

#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: white;
}
</style>
</head>

<table id="customers">

<thead>
    <tr>
    	<th>ID</th>
    	
    	<th>First Name</th>
    	
    	<th>Last Name</th>
    	
    	<th>Default Address?</th>
    	
    	<th>Street</th>
    	
    	<th>City</th>
    	
    	<th>State</th>
    	
    	<th>Postal Code</th>
    </tr>
</thead>

<tbody>
    <?php 
        for ($x = 0; $x < count($persons); $x++)
        {
            echo "<tr>";
            
            echo "<td>" . $persons[$x]['ID'] . "</td>";
            echo "<td>" . $persons[$x]['FIRSTNAME'] . "</td>";
            echo "<td>" . $persons[$x]['LASTNAME'] . "</td>";
            echo "<td>" . $persons[$x]['ISDEFAULT'] . "</td>";
            
            echo "<td>" . $persons[$x]['STREET'] . "</td>";
            echo "<td>" . $persons[$x]['CITY'] . "</td>";
            echo "<td>" . $persons[$x]['STATE'] . "</td>";
            echo "<td>" . $persons[$x]['POSTALCODE'] . "</td>";
            
            echo "</tr>";
        }
    ?>
</tbody>
</table>

<script>
$(document).ready(function()
{
	$('#customers').DataTable();
});
</script>