<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">FARMERS</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Farmers Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cluster</th>
                                    <th>No of Farms</th>
                                    <th>No of Warehouse</th>
                                    <th>Trainings Taken</th>
                                    <th>Education Type</th>
                                    <th>Education Grade</th>
                                    <th>Loan</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Name</th>
                                    <th>Cluster</th>
                                    <th>No of Farms</th>
                                    <th>No of Warehouse</th>
                                    <th>Trainings Taken</th>
                                    <th>Education Type</th>
                                    <th>Education Grade</th>
                                    <th>Loan</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findfarmer = selectAll('farmer', ['status' => 1]);
                                foreach ($findfarmer as $farmer) {
                                ?>
                                    <tr>
                                        <td><?php echo $farmer['firstname'] . " " . $farmer['middlename'] . " " . $farmer['lastname'] ?></td>
                                        <td>
                                            <?php
                                            $clusterId = $farmer['cluster_id'];
                                            $findCluster = selectOne('cluster', ['id' => $clusterId]);
                                            echo $findCluster['cluster_head'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $farmerId = $farmer['id'];
                                            $findFarms = selectAll('farm', ['farmer_id' => $farmerId]);
                                            echo count($findFarms);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $findFarms = selectAll('warehouse', ['farmer_id' => $farmerId]);
                                            echo count($findFarms);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $findFarms = selectAll('warehouse', ['farmer_id' => $farmerId]);
                                            echo count($findFarms);
                                            ?>
                                        </td>
                                        <!-- survey data and review data -->
                                        <td><?php echo $farmer['education_type'] ?></td>
                                        <td><?php echo $farmer['education_grade']; ?></td>
                                        <td>
                                            <?php
                                            $findLoan = selectOne('loans', ['farmer_id' => $farmerId]);
                                            echo number_format($findLoan['amount'], 2);
                                            ?>
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