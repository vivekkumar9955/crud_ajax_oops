<?php
class Database{
    private $dsn ="mysql:host=localhost;dbname=php_oops_crud";
    private $user ="root";
    private $pass = "";

    public $conn;

    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn,$this->user,$this->pass);
            
        }
        catch(PDOException $e){
            echo $e->getMassage();
        }
    }

    public function insert($fname, $lname, $email, $phone){
        $sql ="INSERT INTO users(firstname, lastname, email, phone) VALUE (:fname, :lname, :email, :phone)";
        $stmt =$this->conn->prepare($sql);
        return $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=>$phone]);

        // return $sql;


    }

    public function read(){
        $data = array();

        $sql ="SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $data[] = $row;
        }
        return $data;
    }


    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
       $result  =$stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }

    public function update($id, $fname, $lname, $email, $phone){
        $sql = "UPDATE users SET firstname = :fname, lastname = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=>$phone ,'id'=>$id]);
        return true;

    }

    public function delete($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        return true;
    }
    
    public function totalRowCoount(){
        $sql ="SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $t_rows = $stmt->rowCount();

        return $t_rows;
    }
}

?>