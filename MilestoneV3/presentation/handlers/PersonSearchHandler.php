<!DOCTYPE h2 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<h2>Search Results</h2>
	<p>Here is what we found...</p>
	
    <?php
    // Error Report
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    require_once '../../Autoloader.php';
    require_once '../../header.php';
    
    // Get search input from the form
    $searchPhrase = $_GET['name'];
    
    // Create instance of UserBusinessService
    $ubs = new UserBusinessService();
    
    // The find method returns an array of persons
    $persons = $ubs->findByFirstNameWithAddress($searchPhrase);
    
    // Display
    if ($persons)
    {
        // Results
        echo "Success!";
        include '_displayPeopleSearchResults.php';
    }
    else
    {
        echo "There was no user found under that name<br>";
    }
    ?>
</html>