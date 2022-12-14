<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/user.php';
include_once '../../config/database.php';

$database = new Database();
$db = $database->connect();
$data = new User($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_user();
if($data->first_name != null) {
    //create array
    $user_arr = array(
        "id"=> $data-> id,
        "first_name"=> $data-> first_name,
        "last_name"=> $data-> last_name,
        "user_name"=> $data-> user_name,
        "email"=> $data-> email,
        "gender"=> $data-> gender,
        "date_of_birth"=> $data->date_of_birth,
        "residence"=> $data->residence,
        "phone_number"=> $data->phone_number,
        "id_number"=> $data->id_number,
        "password"=> $data->password,
        "marital_status" => $data-> marital_status,
        "account_type"=> $data->account_type,  
    );

    http_response_code(200);
    echo json_encode($user_arr);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'user not found, maybe you should enroll one')
    );

}
