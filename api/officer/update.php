<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/officer.php';
include_once '../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Officer($db);
$officer_data = json_decode(file_get_contents("php://input"));

$data->id = $data->id;

$data->first_name  = $officer_data->first_name;
$data->last_name  = $officer_data->last_name;
$data->user_name = $officer_data->user_name;
$data->email  = $officer_data->email;
$data->gender = $officer_data->gender;
$data->date_of_birth  = $officer_data->date_of_birth;
$data->phone_number  = $officer_data->phone_number;
$data->service_number = $officer_data->service_number;
$data->rank_id = $officer_data->rank_id;
$data->date_of_join = $officer_data->date_of_join;
$data->status_id = $officer_data->status_id;
$data->can_record_occurence = $officer_data->can_record_occurence;
$data->login_attempt = $officer_data->login_attempt;
$data->password  = $officer_data->password;
$data->account_type = $officer_data->account_type;

if ($data->update_officer()) {
    echo json_encode(
        array("message" => "officer data updated: successfully")
    );
} else {
    echo json_encode(
        array("message" => "officer data update was: unsuccessfully")
    );
}
