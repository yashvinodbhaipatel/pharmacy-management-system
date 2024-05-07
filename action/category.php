<?php
session_start();

//this for requirq fill or mongodriver to connect to php
require_once '../vendor/autoload.php';

//conect to mongoDb database
$databaseConnection = new MongoDB\Client;

//connect specific data base to my data base collection
$mydatabase = $databaseConnection->mydb;

//connect to db collection
$MANUFACTURER = $mydatabase->category;

if (isset($_POST['submit'])) {
   $category = $_POST['category'];
   $med = $_POST['med'];
}

$data = array(          
   "Category" => $category,
   "Medicine Name" => $med
);

$insert = $MANUFACTURER->insertOne($data);
if ($insert) {
   print_r($data);
   header('Location: ../category.php');

} else {
?>
   <center>
      <h4>not ok try again</h4>
   </center>
   <center>
      <a href="../home.php">try again
      </a>
   </center>
<?php
}
?>


<?php //********************************************************** */ 
?>