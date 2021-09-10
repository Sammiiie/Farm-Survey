<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['title']) && isset($_POST['description'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $trainingData = [
        'title' => $title,
        'description' => $description,
    ];

    $createTraining =  insert('training', $trainingData);
    if (!$createTraining) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Investor! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../training.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Investor Successfuly created";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../training.php?message0=$randms");
        exit();
    }
}
