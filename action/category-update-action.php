<?php
require_once '../vendor/autoload.php';

$databaseConnection = new MongoDB\Client;

// Connect to a specific database
$mydatabase = $databaseConnection->mydb;

// Select the "manu" collection
$collection = $mydatabase->category;

$updateRecordId = $_POST['updateRecordId'];
$updateCategory = $_POST['updateCategory'];
$updateMname = $_POST['updateMname'];


// Update the record based on the ID
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($updateRecordId)],
    ['$set' => [
        'Category' => $updateCategory,
        'Medicine Name' => $updateMname,
        
    ]]
);

// Redirect back to your original page after the update
header("Location: ../category.php");
exit;
?>
