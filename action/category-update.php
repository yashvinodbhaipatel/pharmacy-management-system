<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Set a background color and font for the whole page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        /* Style the container */
        .con2 {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
        }

        /* Style the section heading */
        .md {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Style the form elements */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        /* Style the submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style the submit button on hover */
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Add some spacing between records */
        div:not(:last-child) {
            margin-bottom: 30px;
        }

        /* Add spacing to the form */
        form {
            margin-top: 10px;
        }

        /* Center align the form elements */
        form input,
        form button {
            display: block;
            margin: 0 auto;
        }

        .previous-page-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            margin-right: 10px;
            /* Add margin-right for spacing */
        }

        /* Style for the "Previous Page" button on hover */
        .previous-page-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="con2">
        <h2 class="md">CATEGORY DETAILS</h2>
        <br><br>
        <div id="updateFormContainer"></div>
        <?php
        require_once '../vendor/autoload.php';

        $databaseConnection = new MongoDB\Client;

        // Connect to a specific database
        $mydatabase = $databaseConnection->mydb;

        // Select the "manu" collection
        $collection = $mydatabase->category;


        // Execute the query and get the result cursor
        $result = $collection->find([]);

        // Convert the cursor to an array
        $resultArray = iterator_to_array($result);

        // Get the total number of documents in the array using count()
        $totalDocuments = count($resultArray);
        ?>
        <!-- Loop through each document and display update form -->
        <?php foreach ($resultArray as $document) { ?>
            <div>
                <!-- Display existing record details -->
                <p>Name: <?php echo $document['Category']; ?></p>
                <p>Medicine Name: <?php echo $document['Medicine Name']; ?></p>

                <!-- Display update form for each record -->
                <form action="category-update-action.php" method="post">
                    <input type="hidden" name="updateRecordId" value="<?php echo $document['_id']; ?>">
                    <input type="text" class="Category" name="updateCategory" placeholder="Update Category" value="<?php echo $document['Category']; ?>">
                    <input type="text" class="MedicineName" name="updateMname" placeholder="Update Medicine Name" value="<?php echo $document['Medicine Name']; ?>">
                    <button type="submit">Update</button>
                    <button class="previous-page-btn" onclick="goBack()">Previous Page</button>

                </form>
            </div>
        <?php } ?>
    </div>
    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </Script>
</body>

</html>