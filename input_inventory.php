<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">INVENTORY</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float: left;">
                        <h6 class="m-0 font-weight-bold text-primary">Input Inventory Report</h6>
                    </div>
                    <div style="float: right;">
                        <b>Total: <span id="total"></span></b> || 
                        <a href="#" class="btn btn-info btn-icon-split export" data-export-type="excel">
                            <span class="icon text-white-50">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                            </span>
                            <span class="text">Export EXCEL</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Enumurator</th>
                                    <th>Phone</th>
                                    <th>Type of Input</th>
                                    <th>Number of Inputs(KG)</th>
                                    <th>Location of Warehouse</th>
                                    <th>Warehouse Manager</th>
                                    <th>Contact Warehouse Manager</th>
                                    <th>Input Images</th>
                                </tr>
                                <tr id="filterrow">
                                    <th>State</th>
                                    <th>Enumurator</th>
                                    <th>Phone</th>
                                    <th>Type of Input</th>
                                    <th>Number of Inputs(KG)</th>
                                    <th>Location of Warehouse</th>
                                    <th>Warehouse Manager</th>
                                    <th>Contact Warehouse Manager</th>
                                    <th>Input Images</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th colspan="9"></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findcluster = selectAll('input_inventory');
                                foreach ($findcluster as $cluster) {
                                ?>
                                    <tr>
                                        <td><?php echo $cluster['Name_of_State']; ?></td>
                                        <td><?php echo $cluster['Name_of_Needle_Technology_Staff'] ?></td>
                                        <td>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $cluster['Contact_of_Needle_Technology_Staff'] ?>"><?php echo $cluster['Contact_of_Needle_Technology_Staff'] ?></a>
                                            </p>
                                        </td>
                                        <td><?php echo $cluster['Which_type_of_input_is_being_distributed']; ?></td>
                                        <td><?php echo number_format($cluster['Total_Number_of_Input_Received_Kg_Bags']); ?></td>
                                        <td><?php echo $cluster['Location_of_Warehouse']; ?></td>
                                        <td><?php echo $cluster['Name_of_Warehouse_Manager']; ?></td>
                                        <td>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $cluster['Contact_of_Warehouse_Manager'] ?>"><?php echo $cluster['Contact_of_Warehouse_Manager'] ?></a>
                                            </p>
                                        </td>
                                        <td><a href="<?php echo $cluster['Please_upload_any_images_from_the_distribution']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $cluster['Please_upload_any_images_from_the_distribution']; ?></a></td>
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
        $('#dataTable thead tr#filterrow th').each(function() {
            var title = $('#dataTable thead th').eq($(this).index()).text();
            $(this).html('<input type="text" onclick="stopPropagation(event);" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#dataTable').DataTable({
            orderCellsTop: true,
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
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        return dance = intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(4).footer()).html(
                    'Inputs Received (KG) ' + pageTotal.toFixed(2) + ' ( Inputs Received (KG) ' + total.toFixed(2) + ' total)'
                );
                // Update Header
                var answer = 'Inputs Received (KG) ' + pageTotal.toFixed(2) + ' ( Inputs Received (KG) ' + total.toFixed(2) + ' total)';
                $('#total').html(answer);
                // let isNaN = (maybeNaN) => maybeNaN != maybeNaN;
                // console.log(isNaN(pageTotal));
                // console.log(intVal);
            }

        });

        // Apply the filter
        $("#dataTable thead input").on('keyup change', function() {
            table
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });

        function stopPropagation(evt) {
            if (evt.stopPropagation !== undefined) {
                evt.stopPropagation();
            } else {
                evt.cancelBubble = true;
            }
        }
        $(".export").click(function() {
            var export_type = $(this).data('export-type');
            $('#dataTable').tableExport({
                type: export_type,
                escape: 'false',
                ignoreColumn: []
            });
        });

    });
</script>
<?php

include('footer.php');

?>