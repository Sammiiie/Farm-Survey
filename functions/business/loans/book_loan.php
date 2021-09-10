<?php

include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['principal']) && isset($_POST['state']) && isset($_POST['lga']) && isset($_POST['client'])) {
    // intialize post values
    $client = $_POST['client'];
    $principal = floatval(preg_replace('/[^\d.]/', '', $_POST['principal']));
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $crops = $_POST['crops'];
    
    $farmData = [
        'state' => $state,
        'lga' => $lga,
        'crops_grown' => $crops,
        'farmer_id' => $client
    ];
    $createfarm = insert('farm', $farmData);
    // dd($createfarm);
    if (!$createfarm) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not document farm! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmer_view.php?view=$client&message1=$randms");
        exit();
    }
    $loanData = [
        'amount' => $principal,
        'farmer_id' => $client,
        'farm_id' => $createfarm,
        'status' => 0
    ];
    $bookLoan = insert('loan', $loanData);
    if (!$bookLoan) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry loan not recorded Loan! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmer_view.php?view=$client&message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Farm Documented Successfully and Loan Awaiting Approval";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../farmer_view.php?view=$client&message0=$randms");
        exit();
    }
} else {
    // fill in all appropraite data
    $_SESSION["feedback"] = "Fill in all Neccessary Fields";
    $_SESSION["Lack_of_intfund_$randms"] = "10";
    echo header("Location: ../../../farmer_view.php?view=$client&message1=$randms");
    exit();
}
