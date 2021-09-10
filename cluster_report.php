<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">CLUSTERS</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cluster Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cluster Head</th>
                                    <th>Phone</th>
                                    <th>No of Farms</th>
                                    <th>No of Warehouse</th>
                                    <th>Surveys Taken</th>
                                    <th>Survey Reviews</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Name</th>
                                    <th>Cluster Head</th>
                                    <th>Phone</th>
                                    <th>No of Farms</th>
                                    <th>No of Warehouse</th>
                                    <th>Surveys Taken</th>
                                    <th>Survey Reviews</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findcluster = selectAll('cluster');
                                foreach ($findcluster as $cluster) {
                                ?>
                                    <tr>
                                        <td><?php echo $cluster['cluster_name'] ?></td>
                                        <td><?php echo $cluster['cluster_head'] ?></td>
                                        <th>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $cluster['phone_no'] ?>"><?php echo $cluster['phone_no'] ?></a>
                                            </p>
                                        </th>
                                        <th>
                                            <?php 
                                            $clusterId = $cluster['id'];
                                            $findFarms = selectAll('farm', ['cluster_community' => $clusterId]);
                                            echo count($findFarms);
                                            ?>
                                        </th>
                                        <th>
                                            <?php 
                                            $clusterId = $cluster['id'];
                                            $findFarms = selectAll('farm', ['cluster_community' => $clusterId]);
                                            echo count($findFarms);
                                            ?>
                                        </th>
                                        <!-- survey data and review data -->
                                        <th>
                                            <?php 
                                            $clusterId = $cluster['id'];
                                            $findFarms = selectAll('farm', ['cluster_community' => $clusterId]);
                                            echo count($findFarms);
                                            ?>
                                        </th>
                                        <th>
                                            <?php 
                                            $clusterId = $cluster['id'];
                                            $findFarms = selectAll('farm', ['cluster_community' => $clusterId]);
                                            echo count($findFarms);
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