<?php
class Database{

//db params
private $host = "localhost";
private $db_name = "myBlog";
private $username = 'root'; 
private $password = "";
private $conn;

//conntect to db
public function connect(){
    $this->conn = null;
    try{
        $this->conn = new PDO('mysql:host' .  $this->host . ';dbname= ' . $this->db_name , $this->username , $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'connected to db';
    }catch(PDOException $e){
            echo "Connection Error" . $e->getmessage();
    }
    return $this->conn;
}



}


?>