<?php
//OBJECT CREATED FOR INDIVIDUAL COURSES
class Product{
     

    private $conn;
    private $table_name = "product";
     
   
    public $ID;
    public $name;
    public $description;
    public $SKU;
    public $item_price;
    public $image;
     
   
    public function __construct($db){
        $this->conn = $db;
    }
    
    
function create(){
     
  
    $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                name=:name, item_price=:item_price, description=:description, image=:image, SKU=:SKU";
     

    $stmt = $this->conn->prepare($query);
 
  
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":item_price", $this->item_price);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":image", $this->image);
    $stmt->bindParam(":SKU", $this->SKU);
     
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    
    // READ ALL COURSE INFORMATION
    function readAll(){
 

    $query = "SELECT 
                ID, name, description, item_price, SKU, image  
            FROM 
                " . $this->table_name . "
            ORDER BY 
                ID DESC";
 
  
    $stmt = $this->conn->prepare( $query );
     
  
    $stmt->execute();
     
    return $stmt;
}
    function readOne(){
     
    // READ SINGLE COURSE RECORD
    $query = "SELECT 
                name, item_price, description, SKU, image  
            FROM 
                " . $this->table_name . "
            WHERE 
                ID = ? 
            LIMIT 
                0,1";
 
    $stmt = $this->conn->prepare( $query );
     

    $stmt->bindParam(1, $this->ID);
     
 
    $stmt->execute();
 
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    
    $this->name = $row['name'];
    $this->item_price = $row['item_price'];
    $this->description = $row['description'];
    $this->SKU = $row['SKU'];
    $this->image = $row['image'];    
}

// UPDATE THE COURSE INFORMATION    
function update(){
 
  
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                name = :name, 
                item_price = :item_price, 
                description = :description,
                image = :image,
                SKU = :SKU
            WHERE
                ID = :ID";
 
    
    $stmt = $this->conn->prepare($query);
 
   
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':item_price', $this->item_price);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':image', $this->image);
    $stmt->bindParam(':SKU', $this->SKU);
    $stmt->bindParam(':ID', $this->ID);
     
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}  
    
// DELETE THE COURSE
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
     
    // bind id of record to delete
    $stmt->bindParam(1, $this->ID);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}    
}

