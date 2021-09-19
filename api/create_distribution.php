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
    foreach($data as $data){
        $distrubittionData = [
            'Timestamp' => $data['Timestamp'],
            'Name_of_Needle_Technology_Staff' => $data['Name_of_Needle_Technology_Staff'],
            'Contact_of_Needle_Technology_Staff' => $data['Contact_of_Needle_Technology_Staff'],
            'Name_of_State' => $data['Name_of_State'],
            'Anambra_LGA' => $data['Anambra_LGA'],
            'Bayelsa_LGAs' => $data['Bayelsa_LGAs'],
            'Cross_River_LGAs' => $data['Cross_River_LGAs'],
            'Delta_LGAs' => $data['Delta_LGAs'],
            'Ebonyi_LGAs' => $data['Ebonyi_LGAs'],
            'Ekiti_LGAs' => $data['Ekiti_LGAs'],
            'Gombe_LGAs' => $data['Gombe_LGAs'],
            'Imo_LGAs' => $data['Imo_LGAs'],
            'Ogun_LGAs' => $data['12'],
            'Ondo_LGAs' => $data['Ondo_LGAs'],
            'Oyo_LGAs' => $data['Oyo_LGAs'],
            'Taraba_LGAs' => $data['Taraba_LGAs'],
            'Yobe_LGAs' => $data['Yobe_LGAs'],
            'Osun_LGAs' => $data['Osun_LGAs'],
            'Which_type_of_input_is_being_distributed' => $data['Which_type_of_input_is_being_distributed'],
            'Total_amount_of_Input_allocatedReceived_KG_bags' => $data['Total_amount_of_Input_allocatedReceived_KG_bags'],
            'Total_Number_of_Fertilizer_Received_Kg_Bags' => $data['Total_Number_of_Fertilizer_Received_Kg_Bags'],
            'Type_of_Fertilizer' => $data['Type_of_Fertilizer'],
            'Location_of_Warehouse' => $data['Location_of_Warehouse'],
            'Name_of_Warehouse_Manager' => $data['Name_of_Warehouse_Manager'],
            'Contact_of_Warehouse_Manager' => $data['Contact_of_Warehouse_Manager'],
            'Input_given_to' => $data['Input_given_to'],
            'If_others_please_specify' => $data['If_others_please_specify'],
            'If_others_please_specify_the_type_of_fertilizer' => $data['If_others_please_specify_the_type_of_fertilizer'],
            'Name_of_Cluster_Head' => $data['Name_of_Cluster_Head'],
            'Contact_details_of_cluster_head_Phone_Number' => $data['Contact_details_of_cluster_head_Phone_Number'],
            'Name_of_Banks_Representative' => $data['Name_of_Banks_Representative'],
            'Contact_of_Banks_Representative' => $data['Contact_of_Banks_Representative'],
            'Date_of_Distribution' => $data['Date_of_Distribution'],
            'Name_of_Merchanisation_Company' => $data['Name_of_Merchanisation_Company'],
            'Name_of_Merchanisation_companys_Representative' => $data['Name_of_Merchanisation_companys_Representative'],
            'Contact_of_Merchanisation_companys_Representative' => $data['Contact_of_Merchanisation_companys_Representative'],
            'Is_there_any_other_information_we_should_know' => $data['Is_there_any_other_information_we_should_know'],
            'Please_upload_any_images_from_the_distribution' => $data['Please_upload_any_images_from_the_distribution'],
            'status' => "NOT VERIFIED"
        ];
    }
    // dd($distrubittionData);
    $insertDistribution = insert('input_distrubution', $distrubittionData);
    if($insertDistribution){
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Distribution data was uploaded Successfully."));
    }else{
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to upload distribution data."));
    }
}else{
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to upload data. Fill in the appropriate fields."));
}