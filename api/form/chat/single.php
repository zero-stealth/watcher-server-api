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
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_chat();
if($data->sender_name != null) {
    //create array
    $form_arry = array(
        "id"=> $data-> id,
        "sender_name"=> $data-> sender_name,
        "message"=> $data-> message,
        "account_type"=> $data-> account_type,
        "reciver_name"=> $data-> reciver_name, 
        "time_stamp"=> $data-> time_stamp,
    );

    http_response_code(200);
    echo json_encode($form_arry);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'err: no chat found ')
    );

}
