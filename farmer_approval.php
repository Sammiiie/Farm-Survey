<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">APPROVE FARMERS</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Farmer Approval</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Marital Status</th>
                                    <th>Education</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Marital Status</th>
                                    <th>Education</th>
                                    <th></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findclient = selectAll('farmer', ['status' => 0]);
                                foreach ($findclient as $client) {
                                ?>
                                    <tr>
                                        <td><?php echo $client['firstname'] . " " . $client['middlename'] . " " . $client['lastname'] ?></td>
                                        <th>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $client['phone_no'] ?>"><?php echo $client['phone_no'] ?></a>
                                            </p>
                                            <p>
                                                <i class="fas fa-envelope"></i> : <a href="mailto:<?php echo $client['email'] ?>"><?php echo $client['email'] ?></a>
                                            </p>
                                        </th>
                                        <th><?php echo $client['marital_status'] ?></th>
                                        <th><?php echo $client['education_type'] . " - " . $client['education_grade'] ?></th>
                                        <td>
                                            <a href="functions/people/customers/approve_client.php?approve=<?php echo $client['id'] ?>" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Approve</span>
                                            </a>
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