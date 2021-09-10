<?php

include("../../../connect.php");
$itemId = $_POST['itemId'];
if(isset($_POST['itemId'])){
    delete('questions', $itemId, 'id');
}


?>