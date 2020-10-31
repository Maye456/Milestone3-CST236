<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';
require_once '../../Autoloader.php';

class UserDataService
{
    function showAll()
    {
        // Returns an array of persons. Everyone in the database.
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Execute query
        $stmt->execute();
        
        // Get Results
        $result = $stmt->get_result();
        
        if (!$result)
        {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0)
        {
            return null;
        }
        else
        {
            $person_array = array();
            
            while ($persons = $result->fetch_assoc())
            {
                array_push($person_array, $persons);
            }
            return $person_array;
        }
    }
    
    function findByFirstName($n)
    {
        // $n is the search string. Returns an array of persons
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRSTNAME, LASTNAME FROM USERS WHERE FIRSTNAME LIKE ?");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        
        // Execute query
        $stmt->execute();
        
        // Get Results
        $result = $stmt->get_result();
        
        if (!$result)
        {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0)
        {
            return null;
        }
        else 
        {
            $person_array = array();
            
            while ($persons = $result->fetch_assoc())
            {
                array_push($person_array, $persons);
            }
            return $person_array;
        }
    }
    
    function findByLastName($n)
    {
        // $n is the search string. Returns an array of persons
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRSTNAME, LASTNAME FROM USERS WHERE LASTNAME LIKE ?");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        
        // Execute query
        $stmt->execute();
        
        // Get Results
        $result = $stmt->get_result();
        
        if (!$result)
        {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0)
        {
            return null;
        }
        else
        {
            $person_array = array();
            
            while ($persons = $result->fetch_assoc())
            {
                array_push($person_array, $persons);
            }
            return $person_array;
        }
    }
    
    function findById($id)
    {
        // $id is the search string. Returns a person object.
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE ID LIKE ?");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $like_id = "%" . $id . "%";
        $stmt->bind_param("s", $like_id);
        
        // Execute query
        $stmt->execute();
        
        // Get Results
        $result = $stmt->get_result();
        
        if (!$result)
        {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0)
        {
            return null;
        }
        else
        {
            $person_array = array();
            
            while ($persons = $result->fetch_assoc())
            {
                array_push($person_array, $persons);
            }
            
            $p = new Person($person_array[0]['ID'], $person_array[0]['FIRSTNAME'], $person_array[0]['LASTNAME'], $person_array[0]['USERNAME'], $person_array[0]['ROLE'], $person_array[0]['PASSWORD']);
            return $p;
        }
    }
    
    function deleteItem($id)
    {
        // $id is the number to delete. Returns a true (success)
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = ? LIMIT 1");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $stmt->bind_param("s", $id);
        
        // Execute query
        $stmt->execute();
        
        // Get results
        if ($stmt->affected_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function updateOne($id, $persons)
    {
        // $id is the number to update. $person is the item to change. Returns a true (success) or a false (failure)
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRSTNAME = ?, LASTNAME = ? WHERE ID = ? LIMIT 1");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $fn = $persons->getFirst_name();
        $ln = $persons->getLast_name();
        $stmt->bind_param("ssi", $fn, $ln, $id);
        
        // Execute query
        $stmt->execute();
        
        // Get results
        if ($stmt->affected_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function findByFirstNameWithAddress($n)
    {
        // $n is the search string. Returns an array of persons
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT USERS.ID, ISDEFAULT, FIRSTNAME, LASTNAME, STREET, CITY, STATE, POSTALCODE
            FROM USERS
            JOIN ADDRESSES
            ON USERS.ID = ADDRESSES.USERS_ID
            WHERE FIRSTNAME LIKE ?");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        
        // Execute query
        $stmt->execute();
        
        // Get Results
        $result = $stmt->get_result();
        
        if (!$result)
        {
            echo "Assume the SQL statement has an error";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0)
        {
            return null;
        }
        else
        {
            $person_array = array();
            
            while ($persons = $result->fetch_assoc())
            {
                array_push($person_array, $persons);
            }
            return $person_array;
        }
    }
    
    function makeNew($person)
    {
        // Accepts a $person object. Inserts a new record into the USERS table
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO USERS (FIRSTNAME, LASTNAME, USERNAME, ROLE, PASSWORD)
                                        VALUES (?,?,?,?,?)");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }

        // Bind parameters for markers
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $un = $person->getUsername();
        $r = $person->getRole();
        $pw = $person->getPassword();
        
        $stmt->bind_param("sssis", $fn, $ln, $un, $r, $pw);
        
        // Execute query
        $stmt->execute();
        
        // Get results
        if ($stmt->affected_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>