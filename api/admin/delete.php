<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/admin.php';
include_once '../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Admin($db);

$admin_data = json_decode(file_get_contents("php://input"));

$data ->id =$admin_data->id;

try {

    
if($data->delete_admin()){
    echo json_encode(
        array("message" => "admin data deleted: successfully"));
} else {
    echo json_encode(
        array("message" => "admin data deletion was: unsuccessfully"));
}

} catch (Exception $e) {
    echo $e->getMessage();
}
