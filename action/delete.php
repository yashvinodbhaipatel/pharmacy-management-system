<?php
require_once '../vendor/autoload.php';

$databaseConnection = new MongoDB\Client;

// Connect to a specific database
$mydatabase = $databaseConnection->mydb;

// Select the "manu" collection
$collection = $mydatabase->manu;

if (isset($_POST['deleteRecordId'])) {
    $documentId = $_POST['deleteRecordId'];

    // Check if the document ID is not empty
    if (!empty($documentId)) {
        try {
            // Convert the string ID to a MongoDB ObjectId
            $objectId = new MongoDB\BSON\ObjectId($documentId);

            // Delete the document using the ObjectId
            $deleteResult = $collection->deleteOne(['_id' => $objectId]);

            if ($deleteResult->getDeletedCount() > 0) {
                // Record deleted successfully
                header('Location: ../manufacturer.php');
            } else {
                // Handle deletion error
                echo "Error deleting record: No matching document found.";
            }
        } catch (MongoDB\Driver\Exception\InvalidArgumentException $e) {
            // Handle exception caused by invalid ObjectId
            echo "Error deleting record: Invalid ObjectId.";
        }
    } else {
        // Handle case where document ID is empty
        echo "Error deleting record: Document ID is empty.";
    }
} else {
    // Handle case where deleteRecordId is not set in POST
    echo "Error deleting record: deleteRecordId not set.";
}
?>

