<?php
require_once '../vendor/autoload.php';

$databaseConnection = new MongoDB\Client;

// Connect to a specific database
$mydatabase = $databaseConnection->mydb;

// Select the "manu" collection
$collection = $mydatabase->account;

$updateRecordId = $_POST['updateRecordId'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];



// Update the record based on the ID
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($updateRecordId)],
    ['$set' => [
        'Firstname' => $firstname,
        'Lastname' => $lastname,
        'Phone Number' => $phonenumber,
        'Email' => $email,

        
    ]]
);

// Redirect back to your original page after the update
header("Location: ../profile.php");
exit;
?>
