<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/admin.php';
include_once '../../config/database.php';

$database = new Database();
$db = $database->connect();
$data = new Admin($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_admin();
if($data->first_name != null) {
    //create array
    $admin_arry = array(
        "id"=> $data-> id,
        "first_name"=> $data-> first_name,
        "last_name"=> $data-> last_name,
        "user_name"=> $data-> user_name,
        "password"=> $data->password,
        "description"=> $data->description,
        "login_attempt" => $data->login_attempt,
        "account_type"=> $data->account_type,  
    );

    http_response_code(200);
    echo json_encode($admin_arry);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'admin not found, maybe you should enroll one')
    );

}
