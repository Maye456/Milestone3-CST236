<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../Autoloader.php';

class UserBusinessService
{
    function showAll()
    {
        $persons = array();
        
        $dbService = new UserDataService();
        $persons = $dbService->showAll();
        
        return $persons;
    }
    
    function findByFirstName($n)
    {
        $persons = array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstName($n);
        
        return $persons;
    }
    
    function findByLastName($n)
    {
        $persons = array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByLastName($n);
        
        return $persons;
    }
    
    function findById($id)
    {
        // $id is the search string. Returns an array of persons
        $dbService = new UserDataService();
        
        $person = $dbService->findById($id);
        
        return $person;
    }
    
    function deleteItem($id)
    {
        // $id is the number to delete. Returns a true (success)
        $dbService = new UserDataService();
        
        return $dbService->deleteItem($id);
    }
    
    function updateOne($id, $person)
    {
        // $id is the number to update. $person is the item to change. Returns a true (success) or a false (failure)
        $dbService = new UserDataService();
        
        return $dbService->updateOne($id, $person);
    }
    
    function findByFirstNameWithAddress($n)
    {
        // $n is the search string. Returns an array of persons
        $persons = array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstNameWithAddress($n);
        
        return $persons;
    }
    
    function makeNew($person)
    {
        $dbService = new UserDataService();
        return $dbService->makeNew($person);
    }
}
?>