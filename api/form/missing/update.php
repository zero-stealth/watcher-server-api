<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../class/form.php';
include_once '../../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Missing($db);
$form_data = json_decode(file_get_contents("php://input"));

$data->id = $form_data-> id;

$data->firstname  = $form_data-> firstname;
$data->secondname  = $form_data-> secondname;
$data->last_seen  = $form_data-> last_seen;
$data->description  = $form_data-> description;
$data->date_reported  = $form_data-> date_reported;

if($data->update_missing_person()){
    echo json_encode(
        array("message" => "record updated"));
} else {
    echo json_encode(
        array("message" => "record not updated"));
}