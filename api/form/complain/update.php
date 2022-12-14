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
$data = new Complain($db);
$form_data = json_decode(file_get_contents("php://input"));

$data->id = $form_data-> id;


$data->username  = $form_data-> username;
$data->complainer_firstname  = $form_data-> complainer_firstname;
$data->complainer_secondname = $form_data-> complainer_secondname;
$data->complain  = $form_data-> complain;

if($data->update_complain()){
    echo json_encode(
        array("message" => "complains updated"));
} else {
    echo json_encode(
        array("message" => "complains not updated"));
}