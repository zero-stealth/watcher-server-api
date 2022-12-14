<?php

class Admin
{
    // connection
    private $conn;
    // table name  
    private $db_table = "admin";
    // column data
    public $id;
    public $first_name;
    public $last_name;
    public $user_name;
    public $password;
    public $description;
    public $login_attempt;
    public $account_type;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_admins()
    {
        $sql_query = "SELECT id, first_name, last_name, user_name , password , description , login_attempt , account_type FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_admin()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , description = :description ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // bind data
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":description", $this->description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_admin()
    {
        $sql_query = "SELECT id, first_name, last_name, user_name , password , description , login_attempt , account_type FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->first_name = $data_row['first_name'];
        $this->last_name = $data_row['last_name'];
        $this->user_name = $data_row['user_name'];
        $this->password = $data_row['password'];
        $this->description = $data_row['description'];
        $this->login_attempt = $data_row['login_attempt'];
        $this->account_type = $data_row['account_type'];
    }

    //UPDATE DATA
    public function update_admin()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , user_name = :user_name, password = :password , description = :description, account_type = :account_type  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

     //sanitize 
     $this->first_name = htmlspecialchars(strip_tags($this->first_name));
     $this->last_name = htmlspecialchars(strip_tags($this->last_name));
     $this->user_name = htmlspecialchars(strip_tags($this->user_name));
     $this->password = htmlspecialchars(strip_tags($this->password));
     $this->description = htmlspecialchars(strip_tags($this->description));
     $this->login_attempt = htmlspecialchars(strip_tags($this->login_attempt));
     $this->account_type = htmlspecialchars(strip_tags($this->account_type));

     // bind data
     $stmt->bindParam(":first_name", $this->first_name);
     $stmt->bindParam(":last_name", $this->last_name);
     $stmt->bindParam(":user_name", $this->user_name);
     $stmt->bindParam(":password", $this->password);
     $stmt->bindParam(":description", $this->description);
     $stmt->bindParam(":login_attempt", $this->login_attempt);
     $stmt->bindParam(":account_type", $this->account_type);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_admin()
    {
        $sql_query = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize param
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind param value
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
