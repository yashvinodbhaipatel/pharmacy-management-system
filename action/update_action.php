<?php
require_once '../vendor/autoload.php';

$databaseConnection = new MongoDB\Client;

// Connect to a specific database
$mydatabase = $databaseConnection->mydb;

// Select the "manu" collection
$collection = $mydatabase->manu;

$updateRecordId = $_POST['updateRecordId'];
$updateName = $_POST['updateName'];
$updateMedicine = $_POST['updateMed'];
$updateEmail = $_POST['updateEmail'];
$updatePhone = $_POST['updatePhone'];

// Update the record based on the ID
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($updateRecordId)],
    ['$set' => [
        'Name' => $updateName,
        'Medicine Name' => $updateMedicine,
        'Email' => $updateEmail,
        'Phone Number' => $updatePhone
    ]]
);

// Redirect back to your original page after the update
header("Location: ../manufacturer.php");
exit;
?>
