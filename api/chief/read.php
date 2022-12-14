<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../class/chief.php';
include_once '../../config/database.php';

$database = new Database();
$db = $database->connect();
$data = new Chief($db);
$stmt = $data->get_chiefs();
$data_count = $stmt->rowCount();


if ($data_count > 0) {

    $chief_arry = array();
    $chief_arry["body"] = array();
    $chief_arry["data_count"] = $data_count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $d = array(
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_name' => $user_name,
            'email' => $email,
            'gender' => $gender,
            'date_of_birth' => $date_of_birth,
            'phone_number' => $phone_number,
            'service_number' => $service_number,
            'rank_id' => $rank_id,
            'date_of_join' => $date_of_join,
            'status_id' => $status_id,
            'can_record_occurence' => $can_record_occurence,
            'login_attempt' => $login_attempt,
            'account_type' => $account_type,
        );

        array_push($chief_arry["body"], $d);
    }

    echo json_encode($chief_arry);
} else {
    http_response_code(404);
    echo json_encode(
        array('message' => 'no record found, add record dummy ')
    );
}
