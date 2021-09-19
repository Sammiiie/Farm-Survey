<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../functions/connect.php');

// get posted data
// $data = json_decode(file_get_contents("php://input"), true);
$data = file_get_contents("php://input");
// echo $data;
$data = json_decode($data, true);
// print_r($data);
$clusterId = $data['id'];
$userId = $data['userid'];
if($userId != "" && $clusterId != ""){
    $findUser = selectOne('users', ['id' => $userId]);
    $designation = selectOne('designation', ['id' => $findUser['designation_id']]);
    if ($designation['approval'] == 1) {
        $updateCluster = update('input_distrubution', $clusterId, 'id', ['status' => 'VERIFIED',]);
        if ($updateCluster) {
            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Data marked as Verified."));
        }else{
            // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Data not found or Verified."));
        }
    } else {
        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "User does not have rights"));
    }
}else{
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to Verify data. Fill in the appropriate fields."));
}