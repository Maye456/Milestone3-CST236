<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../header.php';
require_once '../../Autoloader.php';

$id = $_GET['id'];

$bs = new UserBusinessService();

$success = $bs->deleteItem($id);

if ($success)
{
    echo "Item was deleted<br>";
}
else 
{
    echo "Nothing was deleted<br>";
}
?>