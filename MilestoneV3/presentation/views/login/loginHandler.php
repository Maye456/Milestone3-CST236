<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'presentation/views/header.php';
require_once 'Autoloader.php';

$attemptedLoginName = $_POST['username'];
$attemptedPassword = $_POST['password'];

echo "You attempted to login with " . $attemptedLoginName . " & " . $attemptedPassword . "<br>"; 

$service = new SecurityService($attemptedLoginName, $attemptedPassword);

$loggedin = $service->authenticate();

if ($loggedin)
{
    $_SESSION['principal'] = true;
    include 'presentation/views/login/loginSuccess.php';
}
else 
{
    $_SESSION['principal'] = false;
    include 'presentation/views/login/loginFailed.php';
}
?>