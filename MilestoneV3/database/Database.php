<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Database
{
    private $dbservername = "l7cup2om0gngra77.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbusername = "edc3g7lgom96cego";
    private $dbpassword = "ptceal54lujjqkb9";
    private $dbname = "ojn0mermyptgs8x5";
    
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
