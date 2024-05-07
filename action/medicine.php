<?php
session_start();

//this for requirq fill or mongodriver to connect to php
require_once '../vendor/autoload.php';

//conect to mongoDb database
$databaseConnection = new MongoDB\Client;

//connect specific data base to my data base collection
$mydatabase = $databaseConnection->mydb;

//connect to db collection
$MANUFACTURER = $mydatabase->med;

if (isset($_POST['submit'])) {
   $med = $_POST['med'];
   $buyqty = $_POST['buyqty'];
   $bprice = $_POST['bprice'];
   $sprice = $_POST['sprice'];
}

$data = array(
   "Medicine Name" => $med,
   "Buying Qty" => $buyqty,
   "Buying Price" => $bprice,
   "Sell Price" => $sprice
);



$insert = $MANUFACTURER->insertOne($data);
if ($insert) {
   print_r($data);
   header('Location: ../medicine.php');
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