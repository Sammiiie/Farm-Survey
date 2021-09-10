<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if(isset($_GET['approve'])){
    $clientId = $_GET['approve'];
    
    $approveClient = update('farmer', $clientId, 'id', ['status' => 1]);
    if (!$approveClient) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not Approve Farmer! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmer_approval.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Farmer Successfuly Approved";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmers.php?message0=$randms");
        exit();
    }
}