<?php
include("../../connect.php");

$state = $_POST['state'];
if (isset($_POST['state'])) {

?>
    <div class="form-group">
        <label for="">LGA</label>
        <select name="lga" id="lga" class="form-control">
            <?php
            $lgas = selectAll('locals', ['state_id' => $state]);
            foreach ($lgas as $lga) {
            ?>
                <option value="<?php echo $lga['local_name'] ?>"><?php echo $lga['local_name'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
<?php

}
?>