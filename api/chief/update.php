<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/chief.php';
include_once '../../config/database.php';

$database = new Database;     
$db = $database->connect();
$data = new Chief($db);
$chief_data = json_decode(file_get_contents("php://input"));

$data->id = $data-> id;

$data->first_name  = $chief_data-> first_name;
$data->last_name  = $chief_data-> last_name;
$data->user_name = $chief_data-> user_name;
$data->email  = $chief_data-> email;
$data->gender = $chief_data-> gender;
$data->date_of_birth  = $chief_data-> date_of_birth;
$data->phone_number  = $chief_data-> phone_number;
$data->service_number = $chief_data-> service_number;
$data->rank_id = $chief_data-> rank_id;
$data->date_of_join = $chief_data-> date_of_join;
$data->status_id = $chief_data-> status_id;
$data->can_record_occurence = $chief_data-> can_record_occurence;
$data->login_attempt = $chief_data-> login_attempt;
$data->password  = $chief_data-> password;
$data->account_type = $chief_data->account_type;

if($data->update_chief()){
    echo json_encode(
        array("message" => "chief data updated: successfully"));
} else {
    echo json_encode(
        array("message" => "chief data update was: unsuccessfully"));
}