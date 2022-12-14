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
$data = new County($db);
$form_data = json_decode(file_get_contents("php://input"));
$data->county_name = $form_data->county_name;
$data->officer_incharge_id = $form_data->officer_incharge_id;

if ($data->create_county()) {
    echo json_encode(
        array("message" => "success: county created")
    );
} else {
    echo json_encode(
        array("message" => "err: county not created")
    );
}
