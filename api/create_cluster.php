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

if(
    !empty($data)
){
    // set values
    // foreach($data as $data){
        $clusterData = [
            'Timestamp' => $data['Timestamp'],
            'Name_of_Enumerator' => $data['Name_of_Enumerator'],
            'ContactPhone_Number_of_Enumerator' => $data['ContactPhone_Number_of_Enumerator'],
            'State' => $data['State'],
            'LGA_RAW' => $data['LGA_RAW'],
            'LGA' => $data['LGA'],
            'Taraba_LGAs' => $data['Taraba_LGAs'],
            'Town' => $data['Town'],
            'Name_Of_Cluster_Head' => $data['Name_Of_Cluster_Head'],
            'Contact_Number_Of_Cluster_Head' => $data['Contact_Number_Of_Cluster_Head'],
            'Cluster_Head_Image' => $data['Cluster_Head_Image'],
            'Name_of_cluster_Area' => $data['Name_of_cluster_Area'],
            'Number_of_Farmer_in_the_Cluster' => $data['Number_of_Farmer_in_the_Cluster'],
            'Size_of_Cluster_Farm_LandHa' => $data['Size_of_Cluster_Farm_LandHa'],
            'Upload_Document_From_Fields_Area_Measure_Application' => $data['Upload_Document_From_Fields_Area_Measure_Application'],
            'Has_the_farm_Land_been_planted_On' => $data['Has_the_farm_Land_been_planted_On'],
            'If_Yes_Upload_Farm_Image' => $data['If_Yes_Upload_Farm_Image'],
            'Latitude' => $data['Latitude'],
            'Longitude' => $data['Longitude'],
            'Oyo_LGAs' => $data['Oyo_LGAs'],
            'Anambra_LGA' => $data['Anambra_LGA'],
            'Bayelsa_LGAs' => $data['Bayelsa_LGAs'],
            'Cross_River_LGAs' => $data['Cross_River_LGAs'],
            'Delta_LGAs' => $data['Delta_LGAs'],
            'Ebonyi_LGAs' => $data['Ebonyi_LGAs'],
            'Ekiti_LGAs' => $data['Ekiti_LGAs'],
            'Gombe_LGAs' => $data['Gombe_LGAs'],
            'Imo_LGAs' => $data['Imo_LGAs'],
            'Ogun_LGAs' => $data['Ogun_LGAs'],
            'Ondo_LGAs' => $data['Ondo_LGAs'],
            'Yobe_LGAs' => $data['Yobe_LGAs'],
            'Osun_LGAs' => $data['Osun_LGAs'],
            'Comment_Pls_indicate_if_Redo_if_work_is_been_done_again' => $data['Comment_Pls_indicate_if_Redo_if_work_is_been_done_again'],
            'which_section_of_MAAN_is_this' => $data['which_section_of_MAAN_is_this'],
            'status' => "NOT VERIFIED"
        ];
    // }
    // dd($distrubittionData);
    $insertCluster = insert('input_cluster', $clusterData);
    if($insertCluster){
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Inventory data was uploaded Successfully."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to upload Inventory data."));
    }
}else{
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to upload data. Fill in the appropriate fields."));
}