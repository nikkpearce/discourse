<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/courses.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
$product->ID=$_POST['ID'];
$product->delete();
?>