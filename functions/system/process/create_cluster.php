<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['name']) && isset($_POST['cluster_head']) && isset($_POST['phone'])) {
    $clusterName = $_POST['name'];
    $clusterHead = $_POST['cluster_head'];
    $clusterPhone = $_POST['phone'];
    $imageLink = $_POST['image'];

    $clusterData = [
        'cluster_head' => $clusterHead,
        'cluster_name' => $clusterName,
        'phone_no' => $clusterPhone,
        'image_link' => $imageLink
    ];
    $createCluster = insert('cluster', $clusterData);
    if(!$createCluster){
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Cluster! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../cluster.php?message1=$randms");
        exit();
    }else{
        $_SESSION["feedback"] = "Cluster successfully created!";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../cluster.php?message0=$randms");
        exit();
    }
} else {
    $_SESSION["feedback"] = "Kindly Fill in all the nescessary details";
    $_SESSION["Lack_of_intfund_$randms"] = "10";
    echo header("Location: ../../../cluster.php?message1=$randms");
    exit();
}
