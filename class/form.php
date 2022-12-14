<?php

class Occurrence

{
    // connection
    private $conn;
    // table name  
    private $db_table = "occurrence";

    // column data
    public $occurrence_id;
    public $occurrence_type_id;
    public $occurrence_user_id;
    public $occurrence_no;
    public $occurrence_date;
    public $occurrence_time;
    public $date_recorded;
    public $time_recorded;
    public $recording_officer_id;
    public $staton_id;
    public $occurrence_place;
    public $occurrence_details;
    public $status_id;
    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_occurrences()
    {
        $sql_query = "SELECT occurrence_id, occurrence_type_id, occurrence_user_id, occurrence_no , occurrence_date, occurrence_time , date_recorded, time_recorded , recording_officer_id, station_id , occurrence_place, occurrence_details, status_id FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_occurrence()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET  occurrence_type_id = :occurrence_type_id, occurrence_user_id =: occurrence_user_id , occurrence_no = :occurrence_no, occurrence_date = :occurrence_date, occurrence_time = :occurrence_time ,  recording_officer_id = :recording_officer_id , station_id = :station_id, , occurrence_place = :occurrence_place, occurrence_details = :occurrence_details , status_id = :status_id ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->occurrence_type_id = htmlspecialchars(strip_tags($this->occurrence_type_id));
        $this->occurrence_user_id = htmlspecialchars(strip_tags($this->occurrence_user_id));
        $this->occurrence_no = htmlspecialchars(strip_tags($this->occurrence_no));
        $this->occurrence_date = htmlspecialchars(strip_tags($this->occurrence_date));
        $this->occurrence_time = htmlspecialchars(strip_tags($this->occurrence_time));
        $this->recording_officer_id = htmlspecialchars(strip_tags($this->recording_officer_id));
        $this->station_id = htmlspecialchars(strip_tags($this->station_id));
        $this->occurrence_place = htmlspecialchars(strip_tags($this->occurrence_place));
        $this->occurrence_details = htmlspecialchars(strip_tags($this->occurrence_details));
        $this->status_id = htmlspecialchars(strip_tags($this->status_id));

        // bind data
        $stmt->bindParam(":occurrence_type_id", $this->occurrence_type_id);
        $stmt->bindParam(":occurrence_user_id", $this->occurrence_user_id);
        $stmt->bindParam(":occurrence_no", $this->occurrence_no);
        $stmt->bindParam(":occurrence_date", $this->occurrence_date);
        $stmt->bindParam(":occurrence_time", $this->occurrence_time);
        $stmt->bindParam(":recording_officer_id", $this->recording_officer_id);
        $stmt->bindParam(":station_id", $this->station_id);
        $stmt->bindParam(":occurrence_place", $this->occurrence_place);
        $stmt->bindParam(":occurrence_details", $this->occurrence_details);
        $stmt->bindParam(":status_id", $this->status_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_occurrence()
    {
        $sql_query = "SELECT occurrence_id, occurrence_type_id, occurrence_user_id, occurrence_no, occurrence_date, occurrence_time, date_recorded, time_recorded, recording_officer_id, station_id, occurrence_place, occurrence_details, status_id FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->occurrence_id = $data_row['occurrence_id'];
        $this->occurrence_type_id = $data_row['occurrence_type_id'];
        $this->occurrence_user_id = $data_row['occurrence_user_id'];
        $this->occurrence_no = $data_row['occurrence_no'];
        $this->occurrence_date = $data_row['occurrence_date'];
        $this->occurrence_time = $data_row['occurrence_time'];
        $this->date_recorded = $data_row['date_recorded'];
        $this->time_recorded = $data_row['time_recorded'];
        $this->recording_officer_id = $data_row['recording_officer_id'];
        $this->station_id = $data_row['station_id'];
        $this->occurrence_place = $data_row['occurrence_place'];
        $this->occurrence_details = $data_row['occurrence_details'];
        $this->status_id = $data_row['status_id'];
    }

    //UPDATE DATA
    public function update_occurrence()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET  occurrence_type_id = :occurrence_type_id , occurrence_user_id = :occurrence_user_id, occurrence_no = :occurrence_no, occurrence_date = :occurrence_date , occurrence_time = :occurrence_time , date_recorded = :date_recorded , time_recorded = :time_recorded , recording_officer_id = :recording_officer_id, station_id = :station_id , occurrence_place = :occurrence_place , occurrence_details = :occurrence_details  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->occurrence_type_id = htmlspecialchars(strip_tags($this->occurrence_type_id));
        $this->occurrence_user_id = htmlspecialchars(strip_tags($this->occurrence_user_id));
        $this->occurrence_no = htmlspecialchars(strip_tags($this->occurrence_no));
        $this->occurrence_date = htmlspecialchars(strip_tags($this->occurrence_date));
        $this->occurrence_time = htmlspecialchars(strip_tags($this->occurrence_time));
        $this->date_recorded = htmlspecialchars(strip_tags($this->date_recorded));
        $this->time_recorded = htmlspecialchars(strip_tags($this->time_recorded));
        $this->recording_officer_id = htmlspecialchars(strip_tags($this->recording_officer_id));
        $this->station_id = htmlspecialchars(strip_tags($this->station_id));
        $this->occurrence_place = htmlspecialchars(strip_tags($this->occurrence_place));
        $this->occurrence_details = htmlspecialchars(strip_tags($this->occurrence_details));
        $this->occurrence_id = htmlspecialchars(strip_tags($this->occurrence_id));


        // bind data
        $stmt->bindParam(":occurrence_id", $this->occurrence_id);
        $stmt->bindParam(":occurrence_type_id", $this->occurrence_type_id);
        $stmt->bindParam(":occurrence_user_id", $this->occurrence_user_id);
        $stmt->bindParam(":occurrence_no", $this->occurrence_no);
        $stmt->bindParam(":occurrence_date", $this->occurrence_date);
        $stmt->bindParam(":occurrence_time", $this->occurrence_time);
        $stmt->bindParam(":date_recorded", $this->date_recorded);
        $stmt->bindParam(":time_recorded", $this->time_recorded);
        $stmt->bindParam(":recording_officer_id", $this->recording_officer_id);
        $stmt->bindParam(":station_id", $this->station_id);
        $stmt->bindParam(":occurrence_place", $this->occurrence_place);
        $stmt->bindParam(":occurrence_details", $this->occurrence_details);
        $stmt->bindParam(":status_id", $this->status_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_occurrence()
    {
        $sql_query = "DELETE FROM " . $this->db_table . " WHERE occurrence_id = ?";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize param
        $this->occurrence_id = htmlspecialchars(strip_tags($this->occurrence_id));

        //bind param value
        $stmt->bindParam(1, $this->occurrenceid);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}



class Report
{
    // connection
    private $conn;
    // table name  
    private $db_table = "report";
    // column data
    public $id;
    public $report_type;
    public $location;
    public $report_date;
    public $time_of_report;
    public $gender;
    public $description;
    public $query;
    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_reports()
    {
        $sql_query = "SELECT id, report_type, location, report_date , time_of_report , gender , description FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_report()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET report_type = :report_type, location = :location , report_date = :report_date, time_of_report = :time_of_report, gender = :gender , description = :description ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->report_type = htmlspecialchars(strip_tags($this->report_type));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->report_date = htmlspecialchars(strip_tags($this->report_date));
        $this->time_of_report = htmlspecialchars(strip_tags($this->time_of_report));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // bind data
        $stmt->bindParam(":report_type", $this->report_type);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":report_date", $this->report_date);
        $stmt->bindParam(":time_of_report", $this->time_of_report);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":description", $this->description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_report()
    {
        $sql_query = "SELECT id, report_type, location, report_date, time_of_report, gender, description FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->report_type = $data_row['report_type'];
        $this->location = $data_row['location'];
        $this->report_date = $data_row['report_date'];
        $this->time_of_report = $data_row['time_of_report'];
        $this->gender = $data_row['gender'];
        $this->description = $data_row['description'];
    }

    //UPDATE DATA
    public function update_report()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET report_type = :report_type, location = :location , report_date = :report_date, time_of_report = :time_of_report, gender = :gender , description = :description  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->report_type = htmlspecialchars(strip_tags($this->report_type));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->report_date = htmlspecialchars(strip_tags($this->report_date));
        $this->time_of_report = htmlspecialchars(strip_tags($this->time_of_report));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":report_type", $this->report_type);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":report_date", $this->report_date);
        $stmt->bindParam(":time_of_report", $this->time_of_report);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":description", $this->description);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // SEARCH PARAM
  public function search()
  {
      $sql_query = "SELECT report_type, location, report_date, time_of_report, gender, description FROM " . $this->db_table . " WHERE report_type = ?  ";
      $stmt = $this->conn->prepare($sql_query);
      $stmt->bindParam(1, $this->query);
      $stmt->execute();
      $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->report_type = $data_row['report_type'];
      $this->location = $data_row['location'];
      $this->report_date = $data_row['report_date'];
      $this->time_of_report = $data_row['time_of_report'];
      $this->gender = $data_row['gender'];
      $this->description = $data_row['description'];
  }



    //DELETE DATA
    function delete_report()
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




class Missing
{
    // connection
    private $conn;
    // table name  
    private $db_table = "missing_person";
    // column data
    public $id;
    public $firstname;
    public $secondname;
    public $last_seen;
    public $description;
    public $date_reported;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_missing_persons()
    {
        $sql_query = "SELECT id, firstname, secondname , last_seen , description , date_reported FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_missing_person()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET firstname = :firstname, secondname = :secondname , last_seen = :last_seen , description = :description , date_reported = :date_reported ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->secondname = htmlspecialchars(strip_tags($this->secondname));
        $this->last_seen = htmlspecialchars(strip_tags($this->last_seen));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->date_reported = htmlspecialchars(strip_tags($this->date_reported));

        // bind data
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":secondname", $this->secondname);
        $stmt->bindParam(":last_seen", $this->last_seen);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date_reported", $this->date_reported);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_missing_person()
    {
        $sql_query = "SELECT id, firstname, secondname, last_seen, description, date_reported  FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->firstname = $data_row['firstname'];
        $this->secondname = $data_row['secondname'];
        $this->last_seen = $data_row['last_seen'];
        $this->description = $data_row['description'];
        $this->date_reported = $data_row['date_reported'];
    }

    //UPDATE DATA
    public function update_missing_person()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET firstname = :firstname, secondname = :secondname , last_seen = :last_seen, description = :description , date_reported = :date_reported  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->secondname = htmlspecialchars(strip_tags($this->secondname));
        $this->last_seen = htmlspecialchars(strip_tags($this->last_seen));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->date_reported = htmlspecialchars(strip_tags($this->date_reported));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":secondname", $this->secondname);
        $stmt->bindParam(":last_seen", $this->last_seen);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date_reported", $this->date_reported);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_missing_person()
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


class Complain
{
    // connection
    private $conn;
    // table name  
    private $db_table = "complains";
    // column data
    public $id;
    public $username;
    public $complainer_firstname;
    public $complainer_secondname;
    public $complain;
    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_complains()
    {
        $sql_query = "SELECT id, username, complainer_firstname ,complainer_secondname , complain  FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_complain()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET  username = :username , complainer_firstname = :complainer_firstname, complainer_secondname = :complainer_secondname , complain = :complain ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->complainer_firstname = htmlspecialchars(strip_tags($this->complainer_firstname));
        $this->complainer_secondname = htmlspecialchars(strip_tags($this->complainer_secondname));
        $this->complain = htmlspecialchars(strip_tags($this->complain));

        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":complainer_firstname", $this->complainer_firstname);
        $stmt->bindParam(":complainer_secondname", $this->complainer_secondname);
        $stmt->bindParam(":complain", $this->complain);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_complain()
    {
        $sql_query = "SELECT id, username, complainer_firstname , complainer_secondname, complain FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $data_row['username'];
        $this->complainer_firstname = $data_row['complainer_firstname'];
        $this->complainer_secondname = $data_row['complainer_secondname'];
        $this->complain = $data_row['complain'];
    }

    //UPDATE DATA
    public function update_complain()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET username = :username , complainer_firstname = :complainer_firstname, complainer_secondname = :complainer_secondname , complain = :complain  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->complainer_firstname = htmlspecialchars(strip_tags($this->complainer_firstname));
        $this->complainer_secondname = htmlspecialchars(strip_tags($this->complainer_secondname));
        $this->complain = htmlspecialchars(strip_tags($this->complain));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":complainer_firstname", $this->complainer_firstname);
        $stmt->bindParam(":complainer_secondname", $this->complainer_secondname);
        $stmt->bindParam(":complain", $this->complain);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_complain()
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

class Chat
{
    // connection
    private $conn;
    // table name  
    private $db_table = "chat";
    // column data
    public $id;
    public $sender_name;
    public $message;
    public $account_type;
    public $reciver_name;
    public $time_st;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_chats()
    {
        $sql_query = "SELECT id, sender_name, message, account_type , reciver_name , time_st FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_chat()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET sender_name = :sender_name, message = :message , account_type = :account_type , reciver_name = :reciver_name , time_st = :time_st";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->sender_name = htmlspecialchars(strip_tags($this->sender_name));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->account_type = htmlspecialchars(strip_tags($this->account_type));
        $this->reciver_name = htmlspecialchars(strip_tags($this->reciver_name));
        $this->time_st = htmlspecialchars(strip_tags($this->time_st));



        // bind data
        $stmt->bindParam(":sender_name", $this->sender_name);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":account_type", $this->account_type);
        $stmt->bindParam(":reciver_name", $this->reciver_name);
        $stmt->bindParam(":time_st", $this->time_st);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_chat()
    {
        $sql_query = "SELECT id, sender_name, message, account_type , reciver_name , time_st FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->sender_name = $data_row['sender_name'];
        $this->message = $data_row['message'];
        $this->account_type = $data_row['account_type'];
        $this->reciver_name = $data_row['reciver_name'];
        $this->time_st = $data_row['time_st'];
    }

    //UPDATE DATA
    public function update_chat()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET sender_name = :sender_name, message = :message , account_type = :account_type  , reciver_name = :reciver_name time_st = :time_st  WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->sender_name = htmlspecialchars(strip_tags($this->sender_name));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->account_type = htmlspecialchars(strip_tags($this->account_type));
        $this->reciver_name = htmlspecialchars(strip_tags($this->reciver_name));
        $this->time_st = htmlspecialchars(strip_tags($this->time_st));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":sender_name", $this->sender_name);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":account_type", $this->account_type);
        $stmt->bindParam(":reciver_name", $this->reciver_name);
        $stmt->bindParam(":time_st", $this->time_st);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_chat()
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


class County
{
    // connection
    private $conn;
    // table name  
    private $db_table = "county";
    // column data
    public $county_id;
    public $county_name;
    public $officer_incharge_id;

    //db connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET ALL DATA
    public function get_counties()
    {
        $sql_query = "SELECT county_id, county_name, officer_incharge_id  FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt;
    }

    //CREATE DATA
    public function create_county()
    {
        $sql_query = "INSERT INTO " . $this->db_table . " SET county_name = :county_name, officer_incharge_id = :officer_incharge_id ";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize 
        $this->county_name = htmlspecialchars(strip_tags($this->county_name));
        $this->officer_incharge_id = htmlspecialchars(strip_tags($this->officer_incharge_id));


        // bind data
        $stmt->bindParam(":county_name", $this->county_name);
        $stmt->bindParam(":officer_incharge_id", $this->officer_incharge_id);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }


    //GET SINGLE DATA
    public function get_county()
    {
        $sql_query = "SELECT county_id, county_name, officer_incharge_id FROM " . $this->db_table . " WHERE county_id = ? LIMIT 0,1 ";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(1, $this->county_id);
        $stmt->execute();
        $data_row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->county_name = $data_row['county_name'];
        $this->officer_incharge_id = $data_row['officer_incharge_id'];
    }

    //UPDATE DATA
    public function update_county()
    {
        $sql_query = "UPDATE " . $this->db_table . " SET county_name = :county_name, officer_incharge_id = :officer_incharge_id  WHERE county_id = :county_id";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize
        $this->county_name = htmlspecialchars(strip_tags($this->county_name));
        $this->officer_incharge_id = htmlspecialchars(strip_tags($this->officer_incharge_id));
        $this->county_id = htmlspecialchars(strip_tags($this->county_id));


        // bind data
        $stmt->bindParam(":county_id", $this->county_id);
        $stmt->bindParam(":county_name", $this->county_name);
        $stmt->bindParam(":officer_incharge_id", $this->officer_incharge_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //DELETE DATA
    function delete_county()
    {
        $sql_query = "DELETE FROM " . $this->db_table . " WHERE county_id = ?";
        $stmt = $this->conn->prepare($sql_query);

        //sanitize param
        $this->county_id = htmlspecialchars(strip_tags($this->county_id));

        //bind param value
        $stmt->bindParam(1, $this->county_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
