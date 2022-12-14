<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/form.php';
include_once '../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Occurrence($db);
$form_data = json_decode(file_get_contents("php://input"));

$data->occurrence_id = $data-> id;

$data->occurrence_id  = $form_data-> occurrence_id;
$data->occurrence_type_id  = $form_data-> occurrence_type_id;
$data->occurrence_user_id = $form_data-> occurrence_user_id;
$data->occurrence_no  = $form_data-> occurrence_no;
$data->occurrence_date = $form_data-> occurrence_date;
$data->occurrence_time  = $form_data-> occurrence_time;
$data->date_recorded  = $form_data-> date_recorded;
$data->time_recorded  = $form_data-> time_recorded;
$data->recording_officer_id  = $form_data-> recording_officer_id;
$data->staton_id  = $form_data-> staton_id;
$data->occurrence_place = $form_data-> occurrence_place;
$data->occurrence_details = $form_data->occurrence_details;
$data->status_id  = $form_data-> status_id;

if($data->update_occurrence()){
    echo json_encode(
        array("message" => "occurrence updated "));
} else {
    echo json_encode(
        array("message" => "update failed"));
}