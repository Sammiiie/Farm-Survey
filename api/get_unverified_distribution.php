<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../functions/connect.php');

if (isset($_GET['userid'])) {
    $userId = $_GET['userid'];

    $findUser = selectOne('users', ['id' => $userId]);
    $designation = selectOne('designation', ['id' => $findUser['designation_id']]);
    if ($designation['approval'] == 1) {
        $findCluster = selectAll('input_distrubution', ['status' => 'NOT VERIFIED']);
        if ($findCluster) {
            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode($findCluster);
        }
    } else {
        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "User does not have rights"));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "User Not Indicated."));
}
