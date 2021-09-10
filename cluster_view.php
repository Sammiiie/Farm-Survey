<?php

include('header.php');

$clusterId = $_GET["view"];
$findCluster = selectOne('cluster', ['id' => $clusterId]);


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $findCluster['cluster_name'] ?></h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cluster Head</h6>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php $findCluster['image_link'] ?>" alt="Cluster Head Image" sizes="height:300px; width: 300px;" srcset="">
                            </div>
                            <div class="col-md-4">
                                <p>
                                    <i class="fas fa-user"></i> : <a href="tel:<?php echo $findCluster['cluster_head'] ?>"><?php echo $findCluster['cluster_head'] ?></a>
                                </p>
                                <p>
                                    <i class="fas fa-envelope"></i> : <a href="tel:<?php echo $findCluster['phone_no'] ?>"><?php echo $findCluster['phone_no'] ?></a>
                                </p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Cluster info -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">Cluster Areas</h6>
                    </div>
                    <div style="float:right">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#bookLoan">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Add to Cluster</span>
                        </a>
                    </div>
                    <!-- Modal -->
                    <form action="functions/system/process/add_area.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal fade" id="bookLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add area to Cluster</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="text" value="<?php echo $clusterId ?>" name="cluster" hidden>
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <select name="state" id="state" class="form-control" required>
                                                <?php
                                                $states = selectAll('states');
                                                foreach ($states as $state) {
                                                ?>
                                                    <option value="<?php echo $state['name'] ?>"><?php echo $state['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div id="lga"></div>

                                        <script>
                                            $(document).ready(function() {
                                                $('#state').on("click", function() {
                                                    var state = $(this).val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/cluster_lga.php",
                                                        method: "POST",
                                                        data: {
                                                            state: state
                                                        },
                                                        success: function(data) {
                                                            $('#lga').html(data);
                                                        }
                                                    })
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /modal ends here -->
                </div>
                <div class="card-body">
                    <?php
                    $findAreas = selectAll('cluster_lga', ['cluster_id' => $clusterId]);
                    if ($findAreas) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>LGA</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>LGA</th>
                                        <th></th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($findAreas as $area) {
                                    ?>
                                        <tr id="<?php echo $area['id'] ?>">
                                            <td><?php echo $area['lga'] ?></td>
                                            <td>
                                                <input type="text" id="itemId<?php echo $area['id'] ?>" value="<?php echo $area['id'] ?>" hidden>
                                                <a href="#" class="btn btn-danger btn-circle" onclick="deleteQuestion()">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <script>
                                                    function deleteQuestion() {

                                                        if (confirm("Are you sure you want to remove this Area from Cluster?")) {
                                                            $(document).ready(function() {
                                                                // alert("Deleted") 
                                                                $('#itemId<?php echo $area['id'] ?>').ready(function() {
                                                                    var itemId = $('#itemId<?php echo $area['id'] ?>').val();
                                                                    $.ajax({
                                                                        url: "functions/system/ajax_functions/delete/delete_area.php",
                                                                        method: "POST",
                                                                        data: {
                                                                            itemId: itemId
                                                                        },
                                                                        success: function(data) {
                                                                            $("#<?php echo $area['id'] ?>").remove();
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
                    <?php
                    } else {
                    ?>
                        CLIENT HAS NO EXISTING Areas
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /loan info -->



    </div>

</div>
<!-- /.container-fluid -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $("#delete-image").click(function() {

        });
    });
</script>

<?php

include('footer.php');

?>