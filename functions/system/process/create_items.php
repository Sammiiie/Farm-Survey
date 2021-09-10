<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['value'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $value = floatval(preg_replace('/[^\d.]/', '', $_POST['value']));

    $itemData = [
        'item_name' => $name,
        'description' => $description,
        'naira_value' => $value
    ];

    $createItem =  insert('farm_items', $itemData);
    if (!$createItem) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Item! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farm_items.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Item Successfuly created";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farm_items.php?message0=$randms");
        exit();
    }
}
