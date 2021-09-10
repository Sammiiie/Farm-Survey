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
                    <div style="float: left;">
                        <h6 class="m-0 font-weight-bold text-primary">Cluster Hectares Report</h6>
                    </div>
                    <div style="float: right;">
                        <b>Total: <span id="total"></span></b>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>LGA</th>
                                    <th>Name</th>
                                    <th>Cluster Head</th>
                                    <th>Cluster Head Image</th>
                                    <th>Phone</th>
                                    <th>Size of Cluster Farm (Hectares)</th>
                                    <th>Number of Farmers</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Farm Images</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th colspan="8"></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findcluster = selectAll('input_cluster');
                                foreach ($findcluster as $cluster) {
                                ?>
                                    <tr>
                                        <td><?php echo $cluster['State']; ?></td>
                                        <td><?php echo $cluster['LGA']; ?></td>
                                        <td><?php echo $cluster['Name_of_cluster_Area'] ?></td>
                                        <td><?php echo $cluster['Name_Of_Cluster_Head'] ?></td>
                                        <td><a href="<?php echo $cluster['Cluster_Head_Image'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $cluster['Cluster_Head_Image'] ?></a></td>
                                        <td>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $cluster['Contact_Number_Of_Cluster_Head'] ?>"><?php echo $cluster['Contact_Number_Of_Cluster_Head'] ?></a>
                                            </p>
                                        </td>
                                        <td><?php echo $cluster['Size_of_Cluster_Farm_LandHa']; ?></td>
                                        <td><?php echo number_format($cluster['Number_of_Farmer_in_the_Cluster']); ?></td>
                                        <td><?php echo $cluster['Latitude']; ?></td>
                                        <td><?php echo $cluster['Longitude']; ?></td>
                                        <td><a href="<?php echo $cluster['If_Yes_Upload_Farm_Image']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $cluster['If_Yes_Upload_Farm_Image']; ?></a></td>
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

<script>
    $(document).ready(function() {
        // var sum;
        // var table = $('#dataTable').DataTable();
        // sum = table.column(6).data().sum();
        // console_log(sum);
        $('#dataTable').DataTable({
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function(i) {

                    if (typeof i === 'string') {
                        i = i.replace(/[\£,]/g, '') * 1;
                    }
                    // check if you got a valid number.
                    if (Number.isNaN(i)) {
                        return 0;
                    }
                    return i;
                };
                var intVal = function(i) {

                    if (typeof i === 'string') {
                        i = i.replace(/[\£,]/g, '') * 1;
                    }
                    // check if you got a valid number.
                    if (Number.isNaN(i)) {
                        return 0;
                    }
                    return i;
                };

                // Total over all pages
                var dance;
                total = api
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return dance = intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(4).footer()).html(
                    'Hectares ' + pageTotal.toFixed(2) + ' ( Hectares ' + total.toFixed(2) + ' total)'
                );
                // Update Header
                var answer = 'Hectares ' + pageTotal.toFixed(2) + ' ( Hectares ' + total.toFixed(2) + ' total)';
                $('#total').html(answer);
                // let isNaN = (maybeNaN) => maybeNaN != maybeNaN;
                // console.log(isNaN(pageTotal));
                // console.log(intVal);
            }
        });

    });
</script>
<?php

include('footer.php');

?>