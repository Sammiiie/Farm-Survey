<?php

include("../../../connect.php");
$itemId = $_POST['itemId'];
dd($itemId);
if(isset($_POST['itemId'])){
    $delete = delete('cluster_lga', $itemId, 'id');
}


?>