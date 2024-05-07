<?php
session_start();

//this for requirq fill or mongodriver to connect to php
require_once '../vendor/autoload.php';

//conect to mongoDb database
$databaseConnection = new MongoDB\Client;

//connect specific data base to my data base collection
$mydatabase = $databaseConnection->mydb;

//connect to db collection
$MANUFACTURER = $mydatabase->manu;

// if ($useraccount) {
//     echo "collection " .$useraccount. " connect";
// } else {
//    echo "error";
// }
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $med = $_POST['med'];
   $email = $_POST['email'];
   $phonenum = $_POST['phonenum'];
}

$data = array(
   "Name" => $name,
   "Medicine Name" => $med,
   "Email" => $email,
   "Phone Number" => $phonenum
);



$insert = $MANUFACTURER->insertOne($data);
if ($insert) {
   print_r($data);
   header('Location: ../manufacturer.php');
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