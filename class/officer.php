<?php

class Officer
{
    // connection
    private $conn;
    // table name  
    private $db_table = "officer";
    // column data
    public $id;
    public $first_name;
    public $last_name;
    public $user_name;
    public $email;
    public $gender;
    public $date_of_birth;
    public $phone_number;
    public $service_number;
    public $rank_id;
    public $date_of_join;
    public $status_id;
    public $can_record_occurence;
    public $login_attempt;
    public $password;
    public $account_type;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_officers()
    {
        $sql_query = "SELECT id, first_name, last_name, user_name , email , gender , date_of_birth , phone_number , service_number , rank_id , date_of_join , status_id , can_record_occurence , login_attempt , account_type FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_officer()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , user_name = :user_name, email = :email, gender = :gender , date_of_birth = :date_of_birth , phone_number = :phone_number , service_number = :service_number , rank_id = :rank_id , date_of_join = :date_of_join, status_id = :status_id ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
        $this->service_number = htmlspecialchars(strip_tags($this->service_number));
        $this->rank_id = htmlspecialchars(strip_tags($this->rank_id));
        $this->date_of_join = htmlspecialchars(strip_tags($this->date_of_join));
        $this->status_id = htmlspecialchars(strip_tags($this->status_id));

        // bind data
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":user_name", $this->user_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":service_number", $this->service_number);
        $stmt->bindParam(":rank_id", $this->rank_id);
        $stmt->bindParam(":date_of_join", $this->date_of_join);
        $stmt->bindParam(":status_id", $this->status_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_officer()
    {
        $sql_query = "SELECT  id, first_name, last_name, user_name , email , gender , date_of_birth , phone_number , service_number , rank_id , date_of_join , status_id , can_record_occurence , login_attempt , password , account_type FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
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
        $this->phone_number = $data_row['phone_number'];
        $this->service_number= $data_row['service_number'];
        $this->rank_id = $data_row['rank_id'];
        $this->date_of_join = $data_row['date_of_join'];
        $this->status_id = $data_row['status_id'];
        $this->can_record_occurence = $data_row['can_record_occurence'];
        $this->login_attempt = $data_row['login_attempt'];
        $this->password = $data_row['password'];
        $this->account_type = $data_row['account_type'];
    }

    //UPDATE DATA
    public function update_officer()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET first_name = :first_name, last_name = :last_name , user_name = :user_name, email = :email, gender = :gender , date_of_birth = :date_of_birth , phone_number = :phone_number , service_number = :service_number , rank_id = :rank_id , date_of_join = :date_of_join, status_id = :status_id , can_record_occurence = :can_record_occurence , login_attempt = :login_attempt , password = :password , account_type = :account_type ";
        $stmt = $this->conn->prepare($sql_query);

          //sanitize 
          $this->first_name = htmlspecialchars(strip_tags($this->first_name));
          $this->last_name = htmlspecialchars(strip_tags($this->last_name));
          $this->user_name = htmlspecialchars(strip_tags($this->user_name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->gender = htmlspecialchars(strip_tags($this->gender));
          $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
          $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
          $this->service_number = htmlspecialchars(strip_tags($this->service_number));
          $this->rank_id = htmlspecialchars(strip_tags($this->rank_id));
          $this->date_of_join = htmlspecialchars(strip_tags($this->date_of_join));
          $this->status_id = htmlspecialchars(strip_tags($this->status_id));
          $this->can_record_occurence = htmlspecialchars(strip_tags($this->can_record_occurence));
          $this->login_attempt = htmlspecialchars(strip_tags($this->login_attempt));
          $this->password = htmlspecialchars(strip_tags($this->password));
          $this->account_type = htmlspecialchars(strip_tags($this->account_type));
  
          // bind data
          $stmt->bindParam(":first_name", $this->first_name);
          $stmt->bindParam(":last_name", $this->last_name);
          $stmt->bindParam(":user_name", $this->user_name);
          $stmt->bindParam(":email", $this->email);
          $stmt->bindParam(":gender", $this->gender);
          $stmt->bindParam(":date_of_birth", $this->date_of_birth);
          $stmt->bindParam(":phone_number", $this->phone_number);
          $stmt->bindParam(":service_number", $this->service_number);
          $stmt->bindParam(":rank_id", $this->rank_id);
          $stmt->bindParam(":date_of_join", $this->date_of_join);
          $stmt->bindParam(":status_id", $this->status_id);
          $stmt->bindParam(":can_record_occurence", $this->can_record_occurence);
          $stmt->bindParam(":login_attempt", $this->login_attempt);
          $stmt->bindParam(":password", $this->password);
          $stmt->bindParam(":account_type", $this->account_type);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }       

    //DELETE DATA
    function delete_officer()
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
