<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Database
{
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "storemodel";
    
    function getConnection()
    {
        $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        
        if ($conn->connect_error)
        {
            echo "Connection failed" . $conn->connect_error . "<br>";
        }
        else
        {
            return $conn;
        }
    }
}
?>