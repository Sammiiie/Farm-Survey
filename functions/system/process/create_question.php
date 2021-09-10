<?php
include("../../connect.php");
session_start();
$digits = 7;
$randms = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

if(isset($_POST['question']) && isset($_POST['type']) && isset($_POST['category'])){
    
    $question = $_POST['question'];
    $type = $_POST['type'];
    $category =  $_POST['category'];
    if($category == 'farm'){
        $farm = 1;
        $warehouse = 0;
    }else if($category == 'warehouse'){
        $farm = 0;
        $warehouse = 1;
    }
    if($type == 3){
        
        $questionData = [
            'question' => $question,
            'type' => $type,
            'farm'=> $farm,
            'warehouse' => $warehouse,
            'option1' => $_POST["option1"],
            'option2' => $_POST["option2"],
            'option3' => $_POST["option3"],
            'option4' => $_POST["option4"],
            'option5' => $_POST["option5"],
            'option6' => $_POST["option6"]
        ];
        // dd($questionData);
    }else{
        $questionData = [
            'question' => $question,
            'type' => $type,
            'farm'=> $farm,
            'warehouse' => $warehouse
        ];
    }
    
    $createQuestion =  insert('questions', $questionData);
    if (!$createQuestion) {
        $error = "Error: \n" . mysqli_error($connection); //checking for errors
        $_SESSION["feedback"] = "Sorry could not create Investor! - $error";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../questions.php?message1=$randms");
        exit();
    } else {
        $_SESSION["feedback"] = "Investor Successfuly created";
        $_SESSION["Lack_of_intfund_$randms"] = "10";
        echo header("Location: ../../../questions.php?message0=$randms");
        exit();
    }
}