<?php

include('header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">CLIENT MANAGEMENT</h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Client</h6>
                </div>
                <div class="card-body">
                    <form class="user" autocomplete="off" method="POST" action="functions/people/customers/create_client.php">
                        <!-- <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username" placeholder="username" required>
                        </div> -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="firstname" placeholder="Firstname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="middlename" placeholder="Middlename">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="lastname" placeholder="Lastname" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control form-control-user" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="">MaritaL Status</label>
                            <select name="marital_status" class="form-control">
                                <option value="SINGLE">SINGLE</option>
                                <option value="ENGAGED">ENGAGED</option>
                                <option value="MARRIED">MARRIED</option>
                                <option value="SEPERATED">SEPERATED</option>
                                <option value="DIVORCED">DIVORCED</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Education Type</label>
                            <select name="education_type" id="bank" class="form-control">
                                <option value="INFORMAL">INFORMAL</option>
                                <option value="FORMAL">FORMAL</option>
                            </select>
                        </div>
                        <div id="branch"></div>
                        <script>
                            $(document).ready(function() {
                                $('#bank').on("click", function() {
                                    var bank = $(this).val();
                                    $.ajax({
                                        url: "functions/system/ajax_functions/education_drop.php",
                                        method: "POST",
                                        data: {
                                            bank: bank
                                        },
                                        success: function(data) {
                                            $('#branch').html(data);
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
                    <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th></th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $findclient = selectAll('farmer', ['status' => 1]);
                                foreach ($findclient as $client) {
                                ?>
                                    <tr>
                                        <td><?php echo $client['firstname'] . " " . $client['middlename'] . " " . $client['lastname'] ?></td>
                                        <td>
                                            <p>
                                                <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $client['phone_no'] ?>"><?php echo $client['phone_no'] ?></a>
                                            </p>
                                            <p>
                                                <i class="fas fa-envelope"></i> : <a href="mailto:<?php echo $client['email'] ?>"><?php echo $client['email'] ?></a>
                                            </p>
                                        </td>
                                        <td>
                                            <a href="farmer_view.php?view=<?php echo $client['id'] ?>" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">View</span>
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