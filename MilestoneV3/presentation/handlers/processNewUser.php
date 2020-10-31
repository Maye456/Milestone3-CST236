<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include '../../header.php';
require_once '../../Autoloader.php';

if (isset($_GET))
{
    $first_name = $_GET['firstname'];
    $last_name = $_GET['lastname'];
    $username = $_GET['username'];
    $role = $_GET['role'];
    $password = $_GET['password'];
}
else 
{
    echo "Nothing submitted by the form. Go back and try another page<br>";
}

// Send a new user object to the business service - > database service chain
$bs = new UserBusinessService();
$user = new Person(0, $first_name, $last_name, $username, $role, $password);

if ($bs->makeNew($user))
{
    echo "User inserted into the database<br>";
}
else 
{
    echo "Nothing was inserted.<br>";
}

echo "<a href='/'>Return to main page</a>";
?>