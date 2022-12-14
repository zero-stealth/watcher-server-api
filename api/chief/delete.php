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

$user_data = json_decode(file_get_contents("php://input"));

$data ->id =$user_data->id;


if($data->delete_chief()){
    echo json_encode(
        array("message" => "chief data deleted: successfully"));
} else {
    echo json_encode(
        array("message" => "chief data deletion was: unsuccessfully"));
}