<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/courses.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// set values
$product->name=$_POST['name'];
$product->description=$_POST['description'];
$product->item_price=$_POST['item_price'];
$product->SKU=$_POST['SKU'];
$product->image=$_POST['image'];
$product->ID=$_POST['ID'];
     
// update 
$product->update();
?>