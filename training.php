<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">TRAINING MANAGEMENT</h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Training</h6>
                </div>
                <div class="card-body">
                    <form class="user" autocomplete="off" method="POST" action="functions/system/process/create_training.php">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="title" placeholder="Title.. " required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="description" placeholder="Description.. " required>
                        </div>


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
                    <h6 class="m-0 font-weight-bold text-primary">Trainings</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findTrainings = selectAll('training');
                                foreach ($findTrainings as $training) {
                                ?>
                                    <tr id="<?php echo $training['id'] ?>">
                                        <td><?php echo $training['title'] ?></td>
                                        <td><?php echo $training['description'] ?></td>

                                        <td>
                                            <input type="text" id="itemId" value="<?php echo $training['id'] ?>" hidden>
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
                                                                    url: "functions/system/ajax_functions/delete/delete_training.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        itemId: itemId
                                                                    },
                                                                    success: function(data) {
                                                                        $("#<?php echo $training['id'] ?>").remove();
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