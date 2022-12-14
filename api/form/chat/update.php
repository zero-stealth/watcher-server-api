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
$data = new Chat($db);
$form_data = json_decode(file_get_contents("php://input"));

$data->id = $form_data-> id;

$data->sender_name  = $form_data->sender_name;
$data->message  = $form_data->message;
$data->account_type = $form_data->account_type;
$data->reciver_name = $form_data->reciver_name;
$data->time_st = $form_data->time_st;

if($data->update_chat()){
    echo json_encode(
        array("message" => "success: chats updated"));
} else {
    echo json_encode(
        array("message" => "err: chat not updated"));
}