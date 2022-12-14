<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

include '../../class/account.php';
include '../../config/database.php';

$database = new Database;
$db = $database->connect();
$account = new Account($db);

$account->session_login();

try {

    if ($account->session_login()) {
        echo json_encode(
            array(
                "message" => "Authentication successfully",
                "account ID" => "$account->id_auth",
                "account name" => "$account->username_auth",
            )
        );
    } else {
        echo json_encode(
            array("message" => "Authentication failed")
        );
    }
    
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}




