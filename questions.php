<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">SURVEY QUESTIONS MANAGEMENT</h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Question</h6>
                </div>
                <div class="card-body">
                    <form class="user" autocomplete="off" method="POST" action="functions/system/process/create_question.php">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="question" placeholder="Question.. ?" required>
                        </div>
                        <div class="form-group">
                            <label for="">Question Target</label>
                            <select name="category" id="category" class="form-control">
                                <option value="farm">Farm</option>
                                <!-- <option value="production">Production</option> -->
                                <option value="warehouse">Warehouse</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Question Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1">Yes/No</option>
                                <option value="2">Descriptive</option>
                                <option value="3">Options</option>
                            </select>
                        </div>

                        <div id="options"></div>
                        <script>
                            $(document).ready(function() {
                                $('#type').on("change click", function() {
                                    var type = $(this).val();
                                    $.ajax({
                                        url: "functions/system/ajax_functions/question_options.php",
                                        method: "POST",
                                        data: {
                                            type: type
                                        },
                                        success: function(data) {
                                            $('#options').html(data);
                                        }
                                    })
                                });
                            });
                        </script>

                        <button type="reset" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Reset</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Submit</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <!-- lists of users -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Questions</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Target</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Question</th>
                                    <th>Target</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findQuestions = selectAll('questions');
                                foreach ($findQuestions as $question) {
                                ?>
                                    <tr id="<?php echo $question['id'] ?>">
                                        <td><?php echo $question['question'] ?></td>
                                        <td>
                                            <?php
                                            if ($question['farm'] == 1) {
                                                echo "Farm";
                                            } else if ($question['warehouse'] == 1) {
                                                echo "Warehouse";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($question['type'] == 1) {
                                                echo "Yes/No";
                                            } else if ($question['type'] == 2) {
                                                echo "Descriptive";
                                            } else if ($question['type'] == 3) {
                                                echo "Options";
                                            } else {
                                                echo "Type was not selected";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <input type="text" id="itemId" value="<?php echo $question['id'] ?>" hidden>
                                            <a href="#" class="btn btn-info btn-circle">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-circle" onclick="deleteQuestion()">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <script>
                                                function deleteQuestion() {

                                                    if (confirm("Are you sure you want to delete this question?")) {
                                                        $(document).ready(function() {
                                                            // alert("Deleted")
                                                            $('#itemId').ready(function() {
                                                                var itemId = $('#itemId').val();
                                                                $.ajax({
                                                                    url: "functions/system/ajax_functions/delete/delete_question.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        itemId: itemId
                                                                    },
                                                                    success: function(data) {
                                                                        $("#<?php echo $question['id'] ?>").remove();
                                                                    }
                                                                })
                                                            });
                                                        });

                                                    } else {
                                                        alert("Not Deleted")
                                                    }
                                                }
                                            </script>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php

include('footer.php');

?>