<?php
include("../../connect.php");
session_start();
$userId = $_SESSION['userid'];
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if(isset($_POST['email']) && isset($_POST['firstname'])){
    
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname =  $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $findEmail = selectAll('farmer', ['phone_no' => $phone]);
    if($findEmail){
        $_SESSION["feedback"] = "Phone number is in use by another Farmer!";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmers.php?message1=$randms");
        exit();
    }
    $guarantorPhone = $_POST['education_type'];
    $guaratorEmail = $_POST['marital_status'];
    $guarantorAddress = $_POST['education_grade'];


    $clientData = [
        'firstname' => $firstname,
        'middlename' => $middlename,
        'lastname' => $lastname,
        'marital_status' => $guaratorEmail,
        'education_type' => $guarantorPhone,
        'education_grade' => $guarantorAddress,
        'email' => $email,
        'phone_no'=> $phone,
        'users_id' => $userId,
        'status' => 0,
    ];
    $createclient =  insert('farmer', $clientData);
    if (!$createclient) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Farmer! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmers.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Farmer Successfuly created";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmers.php?message0=$randms");
        exit();
    }
}