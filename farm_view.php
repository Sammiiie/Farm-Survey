<?php

include('header.php');

$farmId = $_GET["view"];
$findFarm = selectOne('farm', ['id' => $farmId]);
$farmerId = $findFarm['farmer_id'];
$findFarmer = selectOne('farmer', ['id' => $farmerId]);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $findFarmer['firstname'] . " " . $findFarmer['middlename'] . " " . $findFarmer['lastname'] . "'s Farm" ?></h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Farm Info</h6>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label for="">State:</label>
                                <input type="text" class="form-control form-control-user" name="pc_name" value="<?php echo $findFarm['state'] ?>" readonly>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">LGA:</label>
                                <input type="text" class="form-control form-control-user" name="pc_name" value="<?php echo $findFarm['lga'] ?>" readonly>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Crops Grown:</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control form-control-user" readonly> <?php echo $findFarm['crops_grown'] ?> </textarea>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- FARM SURVEY -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">FARM SURVEY</h6>
                    </div>
                    <div style="float:right">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#bookLoan">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Take Survey</span>
                        </a>
                    </div>
                    <!-- Modal -->
                    <!-- <form action="functions/business/loans/book_loan.php" method="post" enctype="multipart/form-data" autocomplete="off"> -->
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
                                    <input type="text" value="<?php echo $farmId ?>" id="farmId" hidden>
                                    <div id="surveyStartForm"></div>
                                    <script>
                                            $(document).ready(function() {
                                                $('#farmId').ready( function() {
                                                    var farmId = $(this).val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/farm_survey.php",
                                                        method: "POST",
                                                        data: {
                                                            farmId: farmId
                                                        },
                                                        success: function(data) {
                                                            $('#surveyStartForm').html(data);
                                                        }
                                                    })
                                                });
                                                $('#surveyFarm').on("click", function() {
                                                    var startdate = $('#startdate').val();
                                                    var device = $('#device').val();
                                                    var longitude = $('#longitude').val();
                                                    var latitude = $('#latitude').val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/lga.php",
                                                        method: "POST",
                                                        data: {
                                                            startdate: startdate,
                                                            device: device,
                                                            longitude: longitude,
                                                            latitude: latitude
                                                        },
                                                        success: function(data) {
                                                            $('#surveyStart').html(data);
                                                        }
                                                    })
                                                });
                                            });
                                        </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- <button type="submit" class="btn btn-primary">Book</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    <!-- /modal ends here -->
                </div>
                <div class="card-body">
                    <?php
                    $findFarmSurvey = selectOne('survey_data', ['farm_id' => $farmId]);
                    $surveyId = $findFarmSurvey['id'];
                    if ($findFarmSurvey) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>

                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th></th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    <?php
                                    $findFarmAnswers = selectAll('survey_data_has_questions', ['survey_data_id' => $$surveyId]);
                                    foreach ($findFarmAnswers as $answer) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $questionId = $answer['question_id'];
                                                $findAnsweredQuestion = selectOne('questions', ['id' => $questionId]);
                                                echo $findAnsweredQuestion['question'];
                                                ?>
                                            </td>
                                            <td><?php echo $answer['answer'] ?></td>
                                            <td>
                                                <a href="farm_view.php?view=<?php echo $details['id'] ?>" class="btn btn-warning btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-warning"></i>
                                                    </span>
                                                    <span class="text">Correct</span>
                                                </a>
                                                <!-- add modal for answer correction -->
                                                <!-- the form should listen via jquery -->
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
                        YET TO SURVEY THIS PROPERTY
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /FAMR SURVEY -->

        <!-- WAREHOUSE SURVEY -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">WAREHOUSE SURVEY</h6>
                    </div>
                    <div style="float:right">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#bookLoan">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Take Survey</span>
                        </a>
                    </div>
                    <!-- Modal -->
                    <!-- <form action="functions/business/loans/book_loan.php" method="post" enctype="multipart/form-data" autocomplete="off"> -->
                    <div class="modal fade" id="bookLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Document Warehouse</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" value="<?php echo $farmId ?>" id="warehouseId" hidden>
                                    <div id="surveyStartForms"></div>
                                    <script>
                                            $(document).ready(function() {
                                                $('#warehouseId').ready( function() {
                                                    var farmId = $(this).val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/warehouse_survey.php",
                                                        method: "POST",
                                                        data: {
                                                            farmId: farmId
                                                        },
                                                        success: function(data) {
                                                            $('#surveyStartForms').html(data);
                                                        }
                                                    })
                                                });
                                                $('#surveyFarm').on("click", function() {
                                                    var startdate = $('#startdate').val();
                                                    var device = $('#device').val();
                                                    var longitude = $('#longitude').val();
                                                    var latitude = $('#latitude').val();
                                                    $.ajax({
                                                        url: "functions/system/ajax_functions/lga.php",
                                                        method: "POST",
                                                        data: {
                                                            startdate: startdate,
                                                            device: device,
                                                            longitude: longitude,
                                                            latitude: latitude
                                                        },
                                                        success: function(data) {
                                                            $('#surveyStart').html(data);
                                                        }
                                                    })
                                                });
                                            });
                                        </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- <button type="submit" class="btn btn-primary">Book</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    <!-- /modal ends here -->
                </div>
                <div class="card-body">
                    <?php
                    $findFarmSurvey = selectOne('survey_data', ['farm_id' => $farmId]);
                    $surveyId = $findFarmSurvey['id'];
                    if ($findFarmSurvey) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>

                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th></th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    <?php
                                    $findFarmAnswers = selectAll('survey_data_has_questions', ['survey_data_id' => $$surveyId]);
                                    foreach ($findFarmAnswers as $answer) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $questionId = $answer['question_id'];
                                                $findAnsweredQuestion = selectOne('questions', ['id' => $questionId]);
                                                echo $findAnsweredQuestion['question'];
                                                ?>
                                            </td>
                                            <td><?php echo $answer['answer'] ?></td>
                                            <td>
                                                <a href="farm_view.php?view=<?php echo $details['id'] ?>" class="btn btn-warning btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-warning"></i>
                                                    </span>
                                                    <span class="text">Correct</span>
                                                </a>
                                                <!-- add modal for answer correction -->
                                                <!-- the form should listen via jquery -->
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
                        YET TO SURVEY THIS PROPERTY
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /WAREHOUSE SURVEY -->

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="assets/fancybox-2.1.7/source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="assets/fancybox-2.1.7/source/jquery.fancybox.js"></script>
        <script type="text/javascript" src="assets/fancybox-2.1.7/source/jquery.fancybox.pack.js"></script>

        <style>
            .fileinput .thumbnail {
                display: inline-block;
                margin-bottom: 10px;
                overflow: hidden;
                text-align: center;
                vertical-align: middle;
                max-width: 250px;
                box-shadow: 0 10px 30px -12px rgba(0, 0, 0, .42), 0 4px 25px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
            }

            .thumbnail {
                border: 0 none;
                border-radius: 4px;
                padding: 0;
            }

            .fileinput .thumbnail>img {
                max-height: 100%;
                width: 100%;
            }

            html * {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            .gallery {
                display: inline-block;
            }

            .close-icon {
                border-radius: 50%;
                position: absolute;
                right: 5px;
                top: -10px;
                padding: 0.1px;
                cursor: pointer;
            }
        </style>
        <!-- Documents -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">Documents</h6>
                    </div>
                    <div style="float:right">
                        <a href="#" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Upload file</span>
                        </a>
                    </div>
                    <!-- Modal -->
                    <form action="functions/system/image_upload.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <input type="text" value="<?php echo $farmId ?>" name="farm" hidden>
                                        <div class="form-group">
                                            <input type="file" class="form-control form-control-user" name="image" placeholder="" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="upload-image" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /modal ends here -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $findImages = selectAll('images', ['farm_id' => $farmId]);
                        foreach ($findImages as $image) {
                        ?>
                            <div class='col-md-4 mt-3'>
                                <a class="fancybox" rel="group" href="uploads/<?php echo $image['title'] ?>">
                                    <img class="img-fluid" alt="" src="uploads/<?php echo $image['title'] ?>" />
                                </a>
                                <form action="functions/system/image_delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $image['idimages'] ?>">
                                    <input type="hidden" name="farm_id" value="<?php echo $image['customers_idcustomers']; ?>">
                                    <button type="submit" id="delete-image" class="close-icon" onclick="return confirm('Are you sure you want to delete this image?')">
                                        <i class="material-icons">clear</i>
                                    </button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /documents -->
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