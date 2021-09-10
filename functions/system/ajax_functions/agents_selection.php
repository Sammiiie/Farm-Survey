<?php
include("../../connect.php");

$placement = $_POST['placement'];
if (isset($_POST['placement'])) {
    if ($placement == 0) {

?>

        <div class="form-group">
            <!-- <label for="">AGENTS</label> -->
            <input type="text" class="form-control form-control-user" name="agent_name" placeholder="Agent's full name" required>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control form-control-user" name="agent_phone" placeholder="Agent's phone no" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="agent_bank" placeholder="Agent's bank" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="agent_account_no" placeholder="Agent's account no" required>
        </div>

    <?php
    } else if ($placement == 1) {
    ?>
        <!-- <label for=""></label> -->
        <select name="agent" id="agent" class="form-control">
            <?php
            $findAgents =  selectAll('agent');
            foreach ($findAgents as $agent) {
            ?>
                <option value="<?php echo $agent['idagents'] ?>">
                    <?php
                    $userId = $agent['users_idusers'];
                    $findUser = selectOne('users', ['userid' => $userId]);
                    echo $findUser['firstname'] . " " . $findUser['middlename'] . " " . $findUser['lastname'];
                    ?>
                </option>
            <?php
            }
            ?>
        </select>
<?php
    }
}
?>