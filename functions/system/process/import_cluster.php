
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
                'Name_of_Enumerator' => $row[1],
                'ContactPhone_Number_of_Enumerator' => $row[2],
                'State' => $row[3],
                'LGA_RAW' => $row[4],
                'LGA' => $row[5],
                'Taraba_LGAs' => $row[6],
                'Town' => $row[7],
                'Name_Of_Cluster_Head' => $row[8],
                'Contact_Number_Of_Cluster_Head' => $row[9],
                'Cluster_Head_Image' => $row[10],
                'Name_of_cluster_Area' => $row[11],
                'Number_of_Farmer_in_the_Cluster' => $row[12],
                'Size_of_Cluster_Farm_LandHa' => $row[13],
                'Upload_Document_From_Fields_Area_Measure_Application' => $row[14],
                'Has_the_farm_Land_been_planted_On' => $row[15],
                'If_Yes_Upload_Farm_Image' => $row[16],
                'Latitude' => $row[17],
                'Longitude' => $row[18],
                'Oyo_LGAs' => $row[19],
                'Anambra_LGA' => $row[20],
                'Bayelsa_LGAs' => $row[21],
                'Cross_River_LGAs' => $row[22],
                'Delta_LGAs' => $row[23],
                'Ebonyi_LGAs' => $row[24],
                'Ekiti_LGAs' => $row[25],
                'Gombe_LGAs' => $row[26],
                'Imo_LGAs' => $row[27],
                'Ogun_LGAs' => $row[28],
                'Ondo_LGAs' => $row[29],
                'Yobe_LGAs' => $row[30],
                'Osun_LGAs' => $row[31],
                'Comment_Pls_indicate_if_Redo_if_work_is_been_done_again' => $row[32],
                'which_section_of_MAAN_is_this' => $row[33],

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
                        'which_section_of_MAAN_is_this' => $data['which_section_of_MAAN_is_this']
                    ];
                }
                $insertCluster = insert('input_cluster', $clusterData);
                if (!$insertCluster) {
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
