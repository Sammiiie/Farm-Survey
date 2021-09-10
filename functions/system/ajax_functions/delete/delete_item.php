<?php

include("../../../connect.php");
$itemId = $_POST['itemId'];
if(isset($_POST['itemId'])){
    $delete = delete('farm_items', $itemId, 'id');
}


?>