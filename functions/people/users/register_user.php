<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if(isset($_POST['email']) && isset($_POST['firstname'])){
    
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname =  $_POST['lastname'];
    // $phone = $_POST['phone'];
    $email = $_POST['email'];
    $findEmail = selectAll('users', ['email' => $email]);
    if($findEmail){
        $_SESSION["feedback"] = "Email is in use by another user!";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../register.php?message1=$randms");
        exit();
    }
    // $designation = 'SUPER ADMIN';

    $password = $_POST['passkey'];
    $confirmPassword = $_POST['confirm_passkey'];
    if($password != $confirmPassword){
        $_SESSION["feedback"] = "Passwords don't match!";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../register.php?message1=$randms");
        exit();
    }
    $passkey = password_hash($password, PASSWORD_DEFAULT);

    $userData = [
        'firstname' => $firstname,
        'middlename' => $middlename,
        'lastname' => $lastname,
        'passkey' => $passkey,
        'email' => $email,
        'designation_id' => '1'
    ];
    $createUser =  insert('users', $userData);
    if (!$createUser) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Account! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../register.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Your Account was Successfuly created";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../login.php?message0=$randms");
        exit();
    }
}