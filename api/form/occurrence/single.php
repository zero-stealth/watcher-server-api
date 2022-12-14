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
$data = new Occurrence($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_occurrence();
if($data->occurrence_type_id != null) {
    //create array
    $form_arry = array(
        "occurrence_id"=> $data-> occurrence_id,
        "occurrence_type_id"=> $data-> occurrence_type_id,
        "occurrence_user_id"=> $data-> occurrence_user_id,
        "occurrence_no"=> $data-> occurrence_no,
        "occurrence_date"=> $data-> occurrence_date,
        "occurrence_time"=> $data-> occurrence_time,
        "date_of_birth"=> $data->date_of_birth,
        "date_recorded"=> $data->date_recorded,
        "time_recorded"=> $data->time_recorded,
        "recording_officer_id"=> $data->recording_officer_id,
        "staton_id"=> $data->staton_id,
        "occurrence_place" => $data-> occurrence_place,
        "occurrence_details"=> $data->occurrence_details,
        "status_id"=> $data->status_id,  
    );

    http_response_code(200);
    echo json_encode($form_arry);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'occurence not found')
    );

}
