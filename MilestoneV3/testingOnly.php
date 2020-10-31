<?php
require_once 'database/UserDataService.php';
require_once 'businessService/model/Person.php';

$u = new UserDataService();

echo "<pre>" . print_r($u->findByFirstName("J"), TRUE) . "</pre>";

echo "<pre>" . print_r($u->findByLastName("B"), TRUE) . "</pre>";

echo "<pre>" . print_r($u->findById(6), TRUE) . "</pre>";

if ($u->deleteItem(721))
{
    echo "Item 721 deleted<br>";
}
else 
{
    echo "Failed to delete item 721";
}

echo "<hr>";

$newperson = new Person(100, "Mikayla", "Bruyere");
echo "<pre>" . print_r($u->findById(728), TRUE) . "</pre>";

$u->updateOne(728, $newperson);
echo "<pre>" . print_r($u->findById(728), TRUE) . "</pre>";
?>