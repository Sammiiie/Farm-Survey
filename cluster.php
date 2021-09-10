<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">CLUSTER MANAGEMENT</h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Cluster</h6>
                </div>
                <div class="card-body">
                    <form class="user" autocomplete="off" method="POST" action="functions/system/process/create_cluster.php">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" placeholder="Cluster name.." required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="cluster_head" placeholder="Cluster Head.." required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control form-control-user" name="phone" placeholder="Cluster Head Phone.." required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="image" placeholder="Cluster Head Image Link..">
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
                    <h6 class="m-0 font-weight-bold text-primary">Cluster</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cluster Head</th>
                                    <th>Cluster Head Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Name</th>
                                    <th>Cluster Head</th>
                                    <th>Cluster Head Phone</th>
                                    <th></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findFarmItems = selectAll('cluster');
                                foreach ($findFarmItems as $farmItem) {
                                ?>
                                    <tr id="<?php echo $farmItem['id'] ?>">
                                        <td><?php echo $farmItem['cluster_name'] ?></td>
                                        <td><?php echo $farmItem['cluster_head'] ?></td>
                                        <td><?php echo $farmItem['phone_no'] ?></td>
                                        <td>
                                            <input type="text" id="itemId" value="<?php echo $farmItem['id'] ?>" hidden>
                                            <a href="cluster_view.php?view=<?php echo $farmItem['id'] ?>" class="btn btn-info btn-circle">
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
                                                                    url: "functions/system/ajax_functions/delete/delete_item.php",
                                                                    method: "POST",
                                                                    data: {
                                                                        itemId: itemId
                                                                    },
                                                                    success: function(data) {
                                                                        $("#<?php echo $farmItem['id'] ?>").remove();
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