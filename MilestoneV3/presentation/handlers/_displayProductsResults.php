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
#products {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#products td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#products tr:nth-child(even){
background-color: #f2f2f2;
}
#products tr:hover {
background-color: #ddd;
}

#products th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: white;
}
</style>
</head>

<table id="products" class="display">

<thead>
    <tr>
    	<th>ID</th>
    	
    	<th>Product Name</th>
    	
    	<th>Description</th>
    	
    	<th>Price</th>
    </tr>
</thead>

<tbody>
    <?php 
        for ($x = 0; $x < count($products); $x++)
        {
            echo "<tr>";
            
            echo "<td>" . $products[$x]['ID'] . "</td>";
            echo "<td>" . $products[$x]['PRODUCTNAME'] . "</td>";
            echo "<td>" . $products[$x]['DESCRIPTION'] . "</td>";
            echo "<td>" . $products[$x]['PRICE'] . "</td>";
            
            echo "</tr>";
        }
    ?>
</tbody>
</table>

<script>
$(document).ready(function()
{
	$('#products').DataTable();
});
</script>