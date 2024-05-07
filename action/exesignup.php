<?php
//this for requirq fill or mongodriver to connect to php
require_once '../vendor/autoload.php';

//conect to mongoDb database
$databaseConnection = new MongoDB\Client;

//connect specific data base to my data base collection
$mydatabase = $databaseConnection->mydb;

//connect to db collection
$useraccount = $mydatabase->account;

?>