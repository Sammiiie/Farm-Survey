<?php

include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if (isset($_POST['transaction_id']) && isset($_POST['principal']) && isset($_POST['interest']) && isset($_POST['repayment'])) {
    // intialize post values
    $investor = $_POST['investor'];
    // $branch = $_POST['branch'];
    $principal = floatval(preg_replace('/[^\d.]/', '', $_POST['principal']));
    $interest = floatval(preg_replace('/[^\d.]/', '', $_POST['interest']));
    $term = $_POST['term'];
    $disbursement = $_POST['disbursement'];
    $upfront = $_POST['upfront'];
    $transactionId =  $_POST['transaction_id'];
    $repaymentDate = $_POST['repayment'];
    $totalDue = floatval(preg_replace('/[^\d.]/', '', $_POST['total_due']));
    $interestAmount = floatval(preg_replace('/[^\d.]/', '', $_POST['interest_amount']));

    $loanData = [
        'amount' => $principal,
        'interest_rate' => $interest,
        'tenure' => $term,
        'disbursement_date' => $disbursement,
        'repayment_date' => $repaymentDate,
        'interest_paid' => 0.00,
        'interest_amount' => $interestAmount,
        'principal_paid' => 0.00,
        'fixed_deposit_idfixed_deposit' => $investor,
        'isapproved' => 0
    ];
    $bookLoan = insert('investment', $loanData);
    if (!$bookLoan) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not book Fixed Depsit! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../investor_view.php?view=$investor&message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Fixed Depsit Booked Successfully and Awaiting Approval";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../investor_view.php?view=$investor&message0=$randms");
        exit();
    }
} else {
    // fill in all appropraite data
    $_SESSION["feedback"] = "Fill in all Neccessary Fields";
    $_SESSION["Lack_of_intfund_$randms"] = "10";
    echo header("Location: ../../../investor_view.php?view=$investor&message1=$randms");
    exit();
}
