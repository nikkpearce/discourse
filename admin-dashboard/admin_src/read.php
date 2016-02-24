<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';
 
// instantiate database and admin user object
$database = new Database();
$db = $database->getConnection();
 
// initialize user
$admin = new Admin($db);
 
// query products
$stmt = $admin->readAllAdmin();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table class='table table-bordered table-hover'>";
     
        // creating our table heading
        echo "<thead>";
        echo "<tr>";
            echo "<th class='width-30-pct'>User Name</th>";
            echo "<th class='width-30-pct'>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Password</th>";
            echo "<th>Type</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
             
            // ADMIN USERS ROW
            echo "<tr>";
                echo "<td style='width:10%;'>{$user_name}</td>";
                echo "<td style='width:10%;'>{$first_name}</td>";
                echo "<td style='width:10%;'>{$last_name}</td>";
                echo "<td style='width:10%;'>{$password}</td>";
                echo "<td style='width:10%;'>{$type}</td>";
                echo "<td style='text-align:center;width:10%'>";
                    // add the record id here, it is used for editing and deleting admin users
                    echo "<div class='admin-id display-none'>{$ID}</div>";
                     
                    // ADMIN EDIT BUTTON
                    echo "<div class='btn2 btn-info admin-edit-btn'>";
                        echo "<span class='glyphicon glyphicon-edit'></span>";
                    echo "</div>";
                     
                    // ADMIN DELETE BUTTON
                    echo "<div class='btn2 btn-danger admin-delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span>";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    //end table
        echo "</tbody>";
    echo "</table>";
     
}
 
// tell the user if no records found
else{
    echo "<div class='alert alert-info'>No admin records found.</div>";
}
 
?>
