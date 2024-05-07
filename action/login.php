<?php
session_start();

//this for requirq fill or mongodriver to connect to php
require_once '../vendor/autoload.php';

//conect to mongoDb database
$databaseConnection = new MongoDB\Client;

//connect specific data base to my data base collection
$mydatabase = $databaseConnection->mydb;

//connect to db collection
$useraccount = $mydatabase->account;

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
}

$data = array(
   "Email" => $email
);

//fetch user from mongo user collection
$fetch = $useraccount->findOne($data);

if ($fetch && password_verify($password, $fetch['Password'])) {
   // Password is correct. Log in the user.
   $_SESSION['email'] = $fetch['Email'];
   header('Location: ../home.php');
   exit();
} else {
   // Incorrect email or password
   header('Location: ../index.php?login_failed=true');
   exit();
}
?>
