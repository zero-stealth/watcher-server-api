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
$data = new Report($db);
$data->id =isset($_GET['id']) ? $_GET['id'] : exit(); //getting param id

$data->get_report();
if($data->report_type != null) {
    //create array
    $form_arry = array(
        "id"=> $data-> id,
        "report_type"=> $data-> report_type,
        "location"=> $data-> location,
        "report_date"=> $data-> report_date,
        "time_of_report"=> $data-> time_of_report,
        "gender"=> $data-> gender,
        "description"=> $data->description,  
    );

    http_response_code(200);
    echo json_encode($form_arry);

} else {
    http_response_code(404);
    echo json_encode(
        array('message'=> 'record not found: get serious')
    );

}
