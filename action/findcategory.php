<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["findcategory"]) || isset($_POST["findmed"])) {
        $categoryName = isset($_POST["findcategory"]) ? $_POST["findcategory"] : "";
        $medicineName = isset($_POST["findmed"]) ? $_POST["findmed"] : "";

        require_once '../vendor/autoload.php';
        $databaseConnection = new MongoDB\Client;
        $mydatabase = $databaseConnection->mydb;
        $collection = $mydatabase->category;

        $query = [];

        if (!empty($categoryName)) {
            $query['Category'] = new MongoDB\BSON\Regex('^' . preg_quote($categoryName), 'i');
        }

        if (!empty($medicineName)) {
            $query['Medicine Name'] = new MongoDB\BSON\Regex('^' . preg_quote($medicineName), 'i');
        }

        $result = $collection->find($query);
        $resultArray = iterator_to_array($result);
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            h2 {
                color: #333;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #007bff;
                color: #fff;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
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
            }
            .previous-page-btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
    <?php
        if (count($resultArray) > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Medicine Category</th>";
            echo "<th>Medicine Name</th>";
            echo "</tr>";

            foreach ($resultArray as $document) {
                echo "<tr>";
                echo "<td>" . $document['Category'] . "</td>";
                echo "<td>" . $document['Medicine Name'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No matching documents found.";
        }
    } else {
        echo "Please fill in both Category Name and Medicine Name fields.";
    }
    ?>
    <button class="previous-page-btn" onclick="goBack()">Previous Page</button>
    </body>
    </html>
    <?php

?>
<script>
    function goBack() {
        window.history.back();
    }
</script>
