<?php

class User
{
    // connection
    private $conn;
    // table name  
    private $db_table = "user";
    // column data
    public $id;
    public $first_name;
    public $last_name;
    public $user_name;
    public $email;
    public $gender;
    public $date_of_birth;
    public $residence;
    public $phone_number;
    public $id_number;
    public $password;
    public $marital_status;
    public $account_type;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_users()
    {
        $sql_query = "SELECT id, first_name, last_name, user_name , email , gender , date_of_birth , residence , phone_number , id_number , password , marital_status , account_type FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_user()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , user_name = :user_name, email = :email, gender = :gender , date_of_birth = :date_of_birth , residence = :residence , phone_number = :phone_number  , marital_status = :marital_status ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->residence = htmlspecialchars(strip_tags($this->residence));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
        $this->id_number = htmlspecialchars(strip_tags($this->id_number));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->account_type = htmlspecialchars(strip_tags($this->account_type));

        // bind data
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":user_name", $this->user_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":residence", $this->residence);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":marital_status", $this->marital_status);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_user()
    {
        $sql_query = "SELECT id, first_name, last_name, user_name, email, gender, date_of_birth, residence, phone_number, id_number, password, marital_status, account_type FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->first_name = $data_row['first_name'];
        $this->last_name = $data_row['last_name'];
        $this->user_name = $data_row['user_name'];
        $this->email = $data_row['email'];
        $this->gender = $data_row['gender'];
        $this->date_of_birth = $data_row['date_of_birth'];
        $this->residence = $data_row['residence'];
        $this->phone_number = $data_row['phone_number'];
        $this->id_number = $data_row['id_number'];
        $this->password = $data_row['password'];
        $this->marital_status = $data_row['marital_status'];
        $this->account_type = $data_row['account_type'];
    }

    //UPDATE DATA
    public function update_user()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , user_name = :user_name, email = :email, gender = :gender , date_of_birth = :date_of_birth , residence = :residence , phone_number = :phone_number , id_number = :id_number, password = :password , marital_status = :marital_status , account_type = :account_type  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->residence = htmlspecialchars(strip_tags($this->residence));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
        $this->id_number = htmlspecialchars(strip_tags($this->id_number));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->marital_status = htmlspecialchars(strip_tags($this->marital_status));
        $this->account_type = htmlspecialchars(strip_tags($this->account_type));
        $this->id=htmlspecialchars(strip_tags($this->id));


        // bind data
        $stmt->bindParam(":id",$this->id);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":user_name", $this->user_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":residence", $this->residence);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":id_number", $this->id_number);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":marital_status", $this->marital_status);
        $stmt->bindParam(":account_type", $this->account_type);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_user()
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
