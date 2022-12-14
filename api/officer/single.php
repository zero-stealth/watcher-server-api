<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../class/officer.php';
include_once '../../config/database.php';

$database = new Database();
$db = $database->connect();
$data = new Officer($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_officer();
if($data->first_name != null) {
    //create array
    $officer_array = array(
        "id"=> $data-> id,
        "first_name"=> $data-> first_name,
        "last_name"=> $data-> last_name,
        "user_name"=> $data-> user_name,
        "email"=> $data-> email,
        "gender"=> $data-> gender,
        "date_of_birth"=> $data->date_of_birth,
        "phone_number"=> $data->phone_number,
        "service_number"=> $data->service_number,
        "rank_id"=> $data->rank_id,
        "date_of_join"=> $data->date_of_join,
        "status_id"=> $data->status_id,
        "can_record_occurence"=> $data->can_record_occurence,
        "login_attempt"=> $data->login_attempt,
        "password"=> $data->password,
        "account_type"=> $data->account_type,  
    );

    http_response_code(200);
    echo json_encode($officer_array);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'officer not found, maybe you should enroll one')
    );

}
