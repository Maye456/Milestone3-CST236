<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';
require_once '../../header.php';

$bs = new ProductBusinessService();

$products = $bs->getAllProducts();

echo "<h1>All Products</h1>";

require_once '../handlers/_displayAllProducts.php';
?>