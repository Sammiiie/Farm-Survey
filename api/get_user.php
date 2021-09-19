<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../functions/connect.php');

// get posted data
// $data = json_decode(file_get_contents("php://input"), true);
// $data = file_get_contents("php://input");
// echo $data;
// $data = json_decode($data, true);

if (isset($_GET['email']) && isset($_GET['passkey'])) {

    $userData = [
        'email' => $_GET['email'],
    ];
    $password = base64_decode($_GET['passkey']);

    $findUser = selectOne('users', $userData);
    $userId = $findUser['id'];
    if ($findUser) {
        if (password_verify($password, $findUser['passkey'])) {
            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "User sussuesful.", "userid" => "$userId"));
        } else {
            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Wrong password."));
        }
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Email not registered"));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Fill in appropraite data."));
}
