<?php

if (isset($_POST['type'])) {
    if ($_POST['type'] == "3") {
        for ($x = 1; $x <= 6; $x++) {

?>
            <div class="form-group">
                <label for="">Option <?php echo $x ?></label>
                <input type="text" class="form-control form-control-user" name="option<?php echo $x ?>" placeholder="Option<?php echo $x ?>">
            </div>
<?php
        }
    }
}

?>