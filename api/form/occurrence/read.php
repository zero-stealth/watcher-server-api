<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../../class/form.php';
include_once '../../../config/database.php';

$database = new Database;
$db = $database->connect();
$data = new Occurrence($db);
$stmt = $data->get_occurrences();
$form_data = $stmt->rowCount();


if ($form_data > 0) {

    $form_arry = array();
    $form_arry["body"] = array();
    $form_arry["form_data"] = $form_data;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $d = array(
            'occurrence_id' => $occurrence_id,
            'occurrence_type_id' => $occurrence_type_id,
            'occurrence_user_id' => $occurrence_user_id,
            'occurrence_no' => $occurrence_no,
            'occurrence_date' => $occurrence_date,
            'occurrence_time' => $occurrence_time,
            'date_recorded' => $date_recorded,
            'time_recorded' => $time_recorded,
            'recording_officer_id' => $recording_officer_id,
            'station_id' => $station_id,
            'occurrence_place' => $occurrence_place,
            'occurrence_details' => $occurrence_details,
            'status_id' => $status_id,
        );

        array_push($form_arry["body"], $d);
    }

    echo json_encode($form_arry);
} else {
    http_response_code(404);
    echo json_encode(
        array('message' => 'no record found, add record dummy ')
    );
}
