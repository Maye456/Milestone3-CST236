<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

spl_autoload_register(function($class)
{
    // Get the difference in folders b/w the location of autoloader and the file that called the autoloader
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    // Count the # of slashes (folder depth)
    $numberOfLastDirectories = substr_count($lastdirectories, '/');
    
    // List of possible locations that classes are found in this app
    $directories = ['businessService', 'businessService/model', 'database', 'presentation', 'presentation/handlers', 
                    'presentation/views', 'presentation/views/login', 'utility'];
    
    // Look inside each directory for desired class
    foreach ($directories as $d)
    {
        $currentDirectory = $d;
        for ($x = 0; $x < $numberOfLastDirectories; $x++)
        {
            $currentDirectory = "../" . $currentDirectory;
        }
        
        $classFile = $currentDirectory . '/' . $class . '.php';
        
        if (is_readable($classFile))
        {
            if (require $d . '/' . $class . '.php')
            {
                break;
            }
        }
    }
});
?>