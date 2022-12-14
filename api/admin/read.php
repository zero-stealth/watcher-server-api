<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../class/admin.php';
include_once '../../config/database.php';

$database = new Database();
$db = $database->connect();
$data = new Admin($db);
$stmt = $data->get_admins();
$data_count = $stmt->rowCount();


if ($data_count > 0) {

    $admin_arry = array();
    $admin_arry["body"] = array();
    $admin_arry["data_count"] = $data_count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $d = array(
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_name' => $user_name,
            'password' => $password,
            'description' => $description,
            'login_attempt' => $login_attempt,
            'account_type' => $account_type,
        );

        array_push($admin_arry["body"], $d);
    }

    echo json_encode($admin_arry);
} else {
    http_response_code(404);
    echo json_encode(
        array('message' => 'no record found, add record dummy ')
    );
}
