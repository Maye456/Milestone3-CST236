<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';

class ProductBusinessService
{
    function getAllProducts()
    {
        $products = array();
        
        $dbService = new ProductDataService();
        $products = $dbService->getAllProducts();
        
        return $products;
    }
    
    function findByProductName($n)
    {
        $products = array();
        
        $dbService = new ProductDataService();
        $products = $dbService->findByProductName($n);
        
        return $products;
    }
    
    function findById($id)
    {
        // $id is the search string. Returns an array of persons
        $dbService = new ProductDataService();
        
        $products = $dbService->findById($id);
        
        return $products;
    }
    
    function getProductByPage($page)
    {
        $products = array();
        
        $dbService = new ProductDataService();
        $products = $dbService->getProductsByPage($page);
        
        return $products;
    }
    
    function getNumberOfProducts()
    {
        $dbService = new ProductDataService();
        return $dbService->getNumberOfProducts();
    }
    
    function getProductByID($id)
    {
        $dbService = new ProductDataService();
        $products = $dbService->getProductByID($id);
        
        return $products;
    }
    
    function deleteProduct($id)
    {
        // $id is the number to delete. Returns a true (success)
        $dbService = new ProductDataService();
        
        return $dbService->deleteProduct($id);
    }
    
    function updateProduct($id, $name, $description, $price)
    {
        // $id is the number to update. $person is the item to change. Returns a true (success) or a false (failure)
        $dbService = new ProductDataService();
        
        if($id < 0)
        {   //insert as new product
            return $dbService->insertProduct($name, $description, $price);
        }
        else 
        {
            return $dbService->updateProduct($id, $name, $description, $price);
        }
    }

    function makeNew($products)
    {
        $dbService = new ProductDataService();
        return $dbService->makeNew($products);
    }
}
?>