<?php

include('header.php');

$clientId = $_GET["view"];
$findClient = selectOne('farmer', ['id' => $clientId]);


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $findClient['firstname'] . " " . $findClient['middlename'] . " " . $findClient['lastname'] ?></h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bio Info</h6>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Contact Details</label>
                        </div>
                        <p>
                            <i class="fas fa-mobile-alt"></i> : <a href="tel:<?php echo $findClient['phone_no'] ?>"><?php echo $findClient['phone_no'] ?></a>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i> : <a href="mailto:<?php echo $findClient['email'] ?>"><?php echo $findClient['email'] ?></a>
                        </p>
                        <!-- <p>
                            <i class="fas fa-address-book"></i> : <?php //echo $findClient['address'] 
                                                                    ?>
                        </p> -->
                        <hr>

                        <div class="form-group">
                            <label for="">Marital Status:</label>
                            <input type="text" class="form-control form-control-user" name="pc_name" value="<?php echo $findClient['marital_status'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Education Type:</label>
                            <input type="text" class="form-control form-control-user" name="pc_name" value="<?php echo $findClient['education_type'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Education Grade:</label>
                            <input type="text" class="form-control form-control-user" name="pc_name" value="<?php echo $findClient['education_grade'] ?>" readonly>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- loan info -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">FARM & WAREHOUSE</h6>
                    </div>
                    <div style="float:right">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#bookLoan">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Document Farm</span>
                        </a>
                    </div>
                    <!-- Modal -->
                    <form action="functions/business/loans/book_loan.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal fade" id="bookLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Document Farm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="text" value="<?php echo $clientId ?>" name="client" hidden>
                                        <div class="form-group">
                                            <!-- LOAN DATA -->
                                            <label for="">Loan Amount</label>
                                            <input type="text" class="form-control form-control-user" id="principal" name="principal" placeholder="Principal...." required>
                                        </div>
                                        <legend>Farm Data</legend>
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

                                        <div class="form-group">
                                            <label for="">Crops Grown</label>
                                            <input type="text" class="form-control form-control-user" id="crops" name="crops" placeholder="Crops Grown...." required>
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                $('#state').on("click", function() {
                                                    var state = $(this).val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/lga.php",
                                                        method: "POST",
                                                        data: {
                                                            state: state
                                                        },
                                                        success: function(data) {
                                                            $('#lga').html(data);
                                                        }
                                                    })
                                                });
                                                $('#principal').on("change blur", function() {
                                                    var amount = $(this).val();
                                                    $.ajax({
                                                        url: "functions/system/converter.php",
                                                        method: "POST",
                                                        data: {
                                                            amount: amount
                                                        },
                                                        success: function(data) {
                                                            $('#principal').val(data);
                                                        }
                                                    })
                                                });
                                            });
                                        </script>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Book</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /modal ends here -->
                </div>
                <div class="card-body">
                    <?php
                    $findLoan = selectOne('farm', ['farmer_id' => $clientId]);
                    if ($findLoan) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>LGA</th>
                                        <th>Crops</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>

                                    <tr>
                                        <th>State</th>
                                        <th>LGA</th>
                                        <th>Crops</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    <?php
                                    $findFarms = selectAll('farm', ['farmer_id' => $clientId]);
                                    foreach ($findFarms as $details) {
                                    ?>
                                        <tr>
                                            <td><?php echo $details['state'] ?></td>
                                            <td><?php echo $details['lga'] ?></td>
                                            <td><?php echo $details['crops_grown'] ?></td>
                                            <td>
                                                <?php
                                                    $farmID = $details['id'];
                                                    $findSurvey = selectOne('survey_data', ['farm_id' => $farmID]);
                                                    if($findSurvey){
                                                        if($findSurvey['status'] == 0){
                                                            echo "Survey Onging";
                                                        }else if($findSurvey['status'] == 1){
                                                            echo "Completed and Aprroved";
                                                        }else if($findSurvey['status'] == 2){
                                                            echo "Completed and Rejected";
                                                        }
                                                    }else{
                                                        echo "Yet to Begin Survey";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="farm_view.php?view=<?php echo $details['id'] ?>" class="btn btn-info btn-icon-split">
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

                    <?php
                    } else {
                    ?>
                        FARMER HAS NO EXISTING FARM(S)
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


<?php

include('footer.php');

?>