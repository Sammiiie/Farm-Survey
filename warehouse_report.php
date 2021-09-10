<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">WAREHOUSE</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Warehouse Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Owner</th>
                                    <th>State</th>
                                    <th>LGA</th>
                                    <th>Cluster</th>
                                    <th>Size</th>
                                    <th>Longitude</th>
                                    <th>Latitutde</th>
                                    <th>Surveyed</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Owner</th>
                                    <th>State</th>
                                    <th>LGA</th>
                                    <th>Cluster</th>
                                    <th>Size</th>
                                    <th>Longitude</th>
                                    <th>Latitutde</th>
                                    <th>Surveyed</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findwarehouse = selectAll('warehouse');
                                foreach ($findwarehouse as $warehouse) {
                                ?>
                                    <tr>
                                        <th>
                                            <?php
                                            $farmerId = $warehouse['farmer_id'];
                                            $findFarmer = selectOne('farmer', ['id' => $farmerId]);
                                            echo $findFarmer['firstname'] . " " . $findFarmer['middlename'] . " " . $findFarmer['lastname'];
                                            ?>
                                        </th>
                                        <td><?php echo $warehouse['state'] ?></td>
                                        <th><?php echo $warehouse['lga'] ?></th>
                                        <th></th>
                                        <th><?php echo $warehouse['size'] ?></th>
                                        <th><?php echo $warehouse['longitude'] ?></th>
                                        <th><?php echo $warehouse['latiitude'] ?></th>
                                        <th>
                                            <?php
                                            $warehouseId = $warehouse['id'];
                                            $findSurvey = selectAll('survey_data', ['warehouse_id' => $warehouseId]);
                                            if($findSurvey){
                                                echo "Existing Survey Data";
                                            }else{
                                                echo "No Survey Data";
                                            }
                                            ?>
                                        </th>

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