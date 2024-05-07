<?php
require_once '../vendor/autoload.php';

$databaseConnection = new MongoDB\Client;

// Connect to a specific database
$mydatabase = $databaseConnection->mydb;

// Select the "manu" collection
$collection = $mydatabase->med;

$updateRecordId = $_POST['updateRecordId'];
$updateMname = $_POST['updateMname'];
$updateQty = $_POST['updateQty'];
$updateBprice = $_POST['updateBprice'];
$updateSprice = $_POST['updateSprice'];

// Update the record based on the ID
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($updateRecordId)],
    ['$set' => [
        'Medicine Name' => $updateMname,
        'Buying Qty' => $updateQty,
        'Buying Price' => $updateBprice,
        'Sell Price' => $updateSprice
    ]]
);

// Redirect back to your original page after the update
header("Location: ../medicine.php");
exit;
?>
