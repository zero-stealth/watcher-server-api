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
$data = new Missing($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_missing_person();
if($data->firstname != null) {
    //create array
    $form_arry = array(
        "id"=> $data-> id,
        "firstname"=> $data-> firstname,
        "secondname"=> $data-> secondname,
        "last_seen"=> $data-> last_seen,
        "description"=> $data->description,
        "date_reported"=> $data->date_reported,  
    );

    http_response_code(200);
    echo json_encode($form_arry);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'missing person not found, maybe you should enroll one')
    );

}
    