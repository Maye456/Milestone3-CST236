<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';
require_once '../../Autoloader.php';

class ProductDataService
{
    function getAllProducts()
    {
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM PRODUCTS");
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc())
            {
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    
    function findByProductName($n)
    {
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, PRODUCTNAME, DESCRIPTION, PRICE FROM PRODUCTS WHERE PRODUCTNAME LIKE ?");
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc())
            {
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    
    function findById($id)
    {
        // $id is the search string. Returns an array of persons
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM PRODUCTS WHERE ID = ? LIMIT 1");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }
        
        // Bind parameters for markers
        $stmt->bind_param("s", $id);
        
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
            $product_array = array();
            
            while ($products = $result->fetch_assoc())
            {
                array_push($product_array, $products);
            }
            
            $p = new Product($product_array[0]['ID'], $product_array[0]['PRODUCTNAME'], $product_array[0]['DESCRIPTION'], $product_array[0]['PRICE'], $product_array[0]['PHOTO']);
            return $p;
        }
    }
    
    function getProductsByPage($page) 
    {
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, PRODUCTNAME, DESCRIPTION, PRICE FROM PRODUCTS LIMIT 10 OFFSET " . 
                                        (($page - 1) * 10));
        
        if(!$stmt) 
        {
            echo "SQL error during count set up.";
            exit();
        }
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) 
        {
            echo "SQL error during results.";
            return null;
            exit();
        }
        else 
        {
            $product_array = array();
            
            while($products = $result->fetch_assoc()) 
            {
                array_push($product_array, $products);
            }
            return $product_array;
        }
    }
    
    function getNumberOfProducts() 
    {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->query("SELECT COUNT(1) FROM PRODUCTS");
        
        $rows = mysqli_fetch_array($stmt);
        return (int)$rows[0];
    }
    
    function getProductByID($id) 
    {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->query("SELECT ID, PRODUCTNAME, DESCRIPTION, PRICE FROM PRODUCTS WHERE ID LIKE BINARY " . $id);
        
        if($stmt->num_rows == 1)
        {
            return $stmt->fetch_assoc();
        }
        return null;
    }
    
    function updateProduct($id, $name, $description, $price) 
    {
        
        $db = new Database();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE PRODUCTS SET PRODUCTNAME = ?, DESCRIPTION = ?, PRICE = ? WHERE ID = ?");
        
        if(!$stmt) 
        {
            echo "SQL error while updating a product.";
            exit();
        }
        
        $stmt->bind_param("sssi", $name, $description, $price, $id);
        
        $result = $stmt->execute();
        
        if($result === false) 
        {
            echo "SQL error during product update results.";
            exit();
        }
    }
    
    function insertProduct($name, $description, $price) 
    {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO `PRODUCTS` (PRODUCTNAME, DESCRIPTION, PRICE) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($query);
        
        if(!$stmt) 
        {
            echo "SQL error while adding a new product.";
            exit();
        }
        
        $stmt->bind_param('sss', $name, $description, $price);
        
        $result = $stmt->execute();
        
        if ($result === false) 
        {   //failed insertion
            echo "SQL error during product insertion results.";
            exit();
        }
    }
    
    function deleteProduct($id) 
    {   
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM PRODUCTS WHERE ID = ?");
        
        if(!$stmt) 
        {
            echo "SQL error while trying to remove a product.";
            exit();
        }
        
        $stmt->bind_param("i", $id);
        
        $result = $stmt->execute();
        
        if($result === false) 
        {
            echo "SQL error while removing product results.";
            exit();
        }
        return true;
    }

    function makeNew($products)
    {
        // Accepts a $person object. Inserts a new record into the USERS table
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO PRODUCTS (PRODUCTNAME, DESCRIPTION, PRICE, PHOTO)
                                        VALUES (?,?,?,?)");
        
        if (!$stmt)
        {
            echo "Something went wrong in the binding process. SQL error?";
            exit;
        }

        // Bind parameters for markers
        $pn = $products->getName();
        $d = $products->getDescription();
        $pr = $products->getPrice();
        $ph = $products->getPhoto();
        
        $stmt->bind_param("ssss", $pn, $d, $pr, $ph);
        
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