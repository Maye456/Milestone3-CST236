<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include "../../header.php";
include "../../Autoloader.php";

$id = $_GET['id'];

$bs = new ProductBusinessService();

$success = $bs->deleteProduct($id);

if ($success) 
{
    echo "Item was deleted<br>";
}
else 
{
    echo "Nothing was deleted<br>";
}

echo '<a href="../views/adminProducts.php">Return to Admin page</a>';

?>