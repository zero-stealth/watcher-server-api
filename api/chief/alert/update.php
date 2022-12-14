<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../class/chief.php';
include_once '../../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Alert($db);
$form_data = json_decode(file_get_contents("php://input"));

$data->id = $data-> id;

$data->title  = $form_data->title;
$data->details = $form_data->details;
$data->alert_type = $form_data->alert_type;

if($data->update_alert()){
    echo json_encode(
        array("message" => "success: alerts updated"));
} else {
    echo json_encode(
        array("message" => "err: alert not updated"));
}