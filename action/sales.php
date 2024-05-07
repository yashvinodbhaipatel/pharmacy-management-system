<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form fields are set and not empty
    if (
        isset($_POST["Medicinename"]) &&
        isset($_POST["numberofmedicine"]) &&
        isset($_POST["price"]) &&
        !empty($_POST["Medicinename"]) &&
        !empty($_POST["numberofmedicine"]) &&
        !empty($_POST["price"])
    ) {
        // Get the form data
        $medicineName = $_POST["Medicinename"];
        $numberOfMedicine = intval($_POST["numberofmedicine"]); // Convert to integer
        $medicinePrice = floatval($_POST["price"]); // Convert to float

        // Connect to MongoDB
        require_once '../vendor/autoload.php';
        $databaseConnection = new MongoDB\Client;

        // Select your database and collection
        $myDatabase = $databaseConnection->mydb;
        $salesCollection = $myDatabase->sales;

        // Create a document to insert into the collection
        $document = [
            "Medicine Name" => $medicineName,
            "Number of Medicine" => $numberOfMedicine,
            "Medicine Price" => $medicinePrice,
            "Date" => new MongoDB\BSON\UTCDateTime(),
        ];

        // Insert the document into the collection
        $insertResult = $salesCollection->insertOne($document);

        if ($insertResult->getInsertedCount() > 0) {
            echo "Sales record inserted successfully.";
            header("Location: ../home.php");
        } else {
            echo "Error inserting sales record.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
