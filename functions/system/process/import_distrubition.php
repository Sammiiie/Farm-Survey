
<?php
include('../../connect.php');
session_start();
/** Include PHPExcel_IOFactory */
include('../../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

$digit = 4;
try {
    $randms = str_pad(random_int(0, (10 ** $digit) - 1), 7, '0', STR_PAD_LEFT);
} catch (Exception $e) {
}
if (isset($_POST['submit'])) {

    //  check for excel file submitted
    if ($_FILES["file"]["name"] !== '') {
        $allowed_extension = array('xls', 'csv', 'xlsx');
        $file_array = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($file_array);

        if (in_array($file_extension, $allowed_extension)) {
            try {
                $file_name = time() . '.' . $file_extension;
                move_uploaded_file($_FILES['file']['tmp_name'], $file_name);
                $file_type = IOFactory::identify($file_name);
                $reader = IOFactory::createReader($file_type);
                $spreadsheet = $reader->load($file_name);

                unlink($file_name);

                //            Data from excel Sheet
                $data = $spreadsheet->getActiveSheet()->toArray();
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            }

            //            our data table for insertion
            $ourDataTables = [];
        }

        //            Join data with content from the excel sheet
        foreach ($data as $key => $row) {
            $ourDataTables[] = array(
                'Timestamp' => $row[0],
                'Name_of_Needle_Technology_Staff' => $row[1],
                'Contact_of_Needle_Technology_Staff' => $row[2],
                'Name_of_State' => $row[3],
                'Anambra_LGA' => $row[4],
                'Bayelsa_LGAs' => $row[5],
                'Cross_River_LGAs' => $row[6],
                'Delta_LGAs' => $row[7],
                'Ebonyi_LGAs' => $row[8],
                'Ekiti_LGAs' => $row[9],
                'Gombe_LGAs' => $row[10],
                'Imo_LGAs' => $row[11],
                'Ogun_LGAs' => $row[12],
                'Ondo_LGAs' => $row[13],
                'Oyo_LGAs' => $row[14],
                'Taraba_LGAs' => $row[15],
                'Yobe_LGAs' => $row[16],
                'Osun_LGAs' => $row[17],
                'Which_type_of_input_is_being_distributed' => $row[18],
                'Total_amount_of_Input_allocatedReceived_KG_bags' => $row[19],
                'Total_Number_of_Fertilizer_Received_Kg_Bags' => $row[20],
                'Type_of_Fertilizer' => $row[21],
                'Location_of_Warehouse' => $row[22],
                'Name_of_Warehouse_Manager' => $row[23],
                'Contact_of_Warehouse_Manager' => $row[24],
                'Input_given_to' => $row[25],
                'If_others_please_specify' => $row[26],
                'If_others_please_specify_the_type_of_fertilizer' => $row[27],
                'Name_of_Cluster_Head' => $row[28],
                'Contact_details_of_cluster_head_Phone_Number' => $row[29],
                'Name_of_Banks_Representative' => $row[30],
                'Contact_of_Banks_Representative' => $row[31],
                'Date_of_Distribution' => $row[32],
                'Name_of_Merchanisation_Company' => $row[33],
                'Name_of_Merchanisation_companys_Representative' => $row[34],
                'Contact_of_Merchanisation_companys_Representative' => $row[35],
                'Is_there_any_other_information_we_should_know' => $row[36],
                'Please_upload_any_images_from_the_distribution' => $row[37]
            );

            if (count($ourDataTables)) {
                $keys = array_keys($ourDataTables);
                $values = '';
                $x = 1;

                foreach ($ourDataTables as $field) {
                    $values .= '?';
                    if ($x < count($ourDataTables)) {
                        $values .= ', ';
                    }
                    $x++;
                }

                foreach ($ourDataTables as $values => $data) {
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
                        'Please_upload_any_images_from_the_distribution' => $data['Please_upload_any_images_from_the_distribution']
                    ];
                }
                $insertDistribution = insert('input_distribution', $distrubittionData);
                if (!$insertDistribution) {
                    $error = "Error: \n" . mysqli_error($connection); //checking for errors
                    $_SESSION["feedback"] = "Sorry could Migrate Data! - $error";
                    $_SESSION["Lack_of_intfund_$randms"] = "10";
                    echo header("Location: ../../../import.php?message1=$randms");
                    exit();
                } else {
                    $_SESSION["feedback"] = "$x Data - Migrated Successfully!";
                    $_SESSION["Lack_of_intfund_$randms"] = "10";
                    echo header("Location: ../../../import.php?message0=$randms");
                    exit();
                }
            }
        }
    }
}
