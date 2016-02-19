<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$admin = new Admin($db);
 
// set values
$admin->user_name=$_POST['user_name'];
$admin->first_name=$_POST['first_name'];
$admin->last_name=$_POST['last_name'];
$admin->password=md5($_POST['password']);
$admin->type=$_POST['type'];
$admin->ID=$_POST['ID'];
     
// update 
$admin->updateAdmin();
?>