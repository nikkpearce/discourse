<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/courses.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// query products
$stmt = $product->readAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // start table
    echo "<table class='table table-bordered table-hover'>";
     
        // creating our table heading
        echo "<tr>";
            echo "<th class='width-30-pct'>Course Name</th>";
            echo "<th class='width-30-pct'>Course Description</th>";
            echo "<th>Price</th>";
            echo "<th>SKU</th>";
            echo "<th>Course Image</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
         
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>{$item_price}</td>";
                echo "<td>{$SKU}</td>";
                echo "<td>{$image}</td>";
                echo "<td style='text-align:center;'>";
                    // add the record id here, it is used for editing and deleting products
                    echo "<div class='product-id display-none'>{$ID}</div>";
                     
                    // edit button
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
                    echo "</div>";
                     
                    // delete button
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    //end table
    echo "</table>";
     
}
 
// tell the user if no records found
else{
    echo "<div class='alert alert-info'>No records found.</div>";
}
 
?>
