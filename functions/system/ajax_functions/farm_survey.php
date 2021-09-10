<?php
include("../../connect.php");

$farmId = $_POST['farmId'];
if (isset($_POST['farmId'])) {

    $findFarmSurvey = selectOne('survey_data', ['farm_id' => $farmId]);
    $surveyId = $findFarmSurvey['id'];
    if (!$findFarmSurvey) {

?>
        <div class="form-group">
            <label for="">Start Date</label>
            <input type="date" class="form-control form-control-user" id="startdate" name="startdate" required>
        </div>
        <div class="form-group">
            <label for="">Device Id</label>
            <input type="text" class="form-control form-control-user" id="device" name="device" placeholder="Device Id...." required>
        </div>
        <div class="form-group">
            <label for="">Longitude</label>
            <input type="text" class="form-control form-control-user" id="longitude" name="longitude" placeholder="Longitude...." required>
        </div>
        <div class="form-group">
            <label for="">Latitude</label>
            <input type="text" class="form-control form-control-user" id="latitutde" name="latitutde" placeholder="Latitutde...." required>
        </div>
        <button type="submit" id="surveyFarm" class="btn btn-primary">Begin Survey</button>

<?php

    }
}

?>