<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$admin = new Admin($db);
 
$admin->ID=$_POST['ID'];
$admin->deleteAdmin();
?>