<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['lga']) && isset($_POST['state'])) {
    $clusterId  = $_POST['cluster'];
    $state =  $_POST['state'];
    $lga = $_POST['lga'];

    foreach ($lga as $area) {
        $clusterAreaData = [
            'state' => $state,
            'lga' => $area,
            'cluster_id' => $clusterId
        ];
        $findArea = selectOne('cluster_lga', ['lga' => $lga]);
        if($findArea){
            $_SESSION["feedback"] = "$area - LGA already assigned to a cluster";
            $_SESSION["Lack_of_intfund_$randms"] = "10";
            echo header("Location: ../../../cluster_view.php?view=$clusterId&message1=$randms");
            exit();
        }
        $storeArea = insert('cluster_lga', $clusterAreaData);
        if (!$storeArea) {
            $error = "Error: \n" . mysqli_error($connection); //checking for errors
            $_SESSION["feedback"] = "Sorry could not store cluster! - $error";
            $_SESSION["Lack_of_intfund_$randms"] = "10";
            echo header("Location: ../../../cluster_view.php?view=$clusterId&message1=$randms");
        }else{
            $_SESSION["feedback"] = "Area(s) successfully added to cluster";
            $_SESSION["Lack_of_intfund_$randms"] = "10";
            echo header("Location: ../../../cluster_view.php?view=$clusterId&message0=$randms");
        }
    }
}
