<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';
require_once '../../header.php';

$bs = new UserBusinessService();

$persons = $bs->showAll();

echo "<h1>All Users</h1>";

require_once '../handlers/_displayAllUsers.php';
?>