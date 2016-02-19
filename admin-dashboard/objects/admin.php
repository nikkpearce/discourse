<?php
//OBJECT CREATED FOR INDIVIDUAL COURSES
class Admin{
     

    private $conn;
    private $table_name = "user";
     
   
    public $ID;
    public $user_name;
    public $first_name;
    public $last_name;
    public $password;
    public $type;
    
     
   
    public function __construct($db){
        $this->conn = $db;
    }
    
    
function createAdmin(){
     
  
    $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                user_name=:user_name, first_name=:first_name, last_name=:last_name, password=:password, type=:type";
     

    $stmt = $this->conn->prepare($query);
 
    
    $stmt->bindParam(":user_name", $this->user_name);
    $stmt->bindParam(":first_name", $this->first_name);
    $stmt->bindParam(":last_name", $this->last_name);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":type", $this->type);
     
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    
    // READ ALL COURSE INFORMATION
    function readAllAdmin(){
 

    $query = "SELECT 
                ID, user_name, first_name, last_name, password, type 
            FROM 
                " . $this->table_name . "
            ORDER BY 
                ID DESC";
 
  
    $stmt = $this->conn->prepare( $query );
     
  
    $stmt->execute();
     
    return $stmt;
}
    function readOneAdmin(){
     
    // READ SINGLE COURSE RECORD
    $query = "SELECT 
                user_name, first_name, last_name, password, type 
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
     
    
    $this->user_name = $row['user_name'];
    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->password = $row['password'];
    $this->type = $row['type'];    
}

// UPDATE THE COURSE INFORMATION    
function updateAdmin(){
 
  
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                user_name = :user_name, 
                first_name = :first_name, 
                last_name = :last_name,
                password = :password,
                type = :type
            WHERE
                ID = :ID";
 
    
    $stmt = $this->conn->prepare($query);
 
   
    $stmt->bindParam(':user_name', $this->user_name);
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':ID', $this->ID);
     
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}  
    
// DELETE THE COURSE
function deleteAdmin(){
 
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

