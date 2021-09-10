<?php
session_start();

if (!$_SESSION["loggedin"] == True) {
    header("location: login.php");
    exit;
}
include("functions/connect.php");

// include("ajaxcall.php");
$designation = $_SESSION['designation'];
$findRights = selectOne('designation', ['id' => $designation]);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farm Survey</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- map -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3ZgNgivnZz7TmyCBlW-2B09mHGKrO_g&callback=initMap" async></script> -->
   

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- feedback to customer using sweet alert -->
    <?php
    $exp_error = "";
    $message = $_SESSION['feedback'];
    if ($message != "") {
    ?>
        <input type="text" value="<?php echo $message ?>" id="feedback" hidden>
    <?php
    }
    // feedback messages 0 for success and 1 for errors

    if (isset($_GET["message0"])) {
        $key = $_GET["message0"];
        $tt = 0;

        if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
            echo '<script type="text/javascript">
          $(document).ready(function(){
            let feedback =  document.getElementById("feedback").value;
              swal({
                  type: "success",
                  title: "Success",
                  text: feedback,
                  showConfirmButton: true,
                  
              })
          });
          </script>
          ';
            $_SESSION["lack_of_intfund_$key"] = 0;
        }
    } else if (isset($_GET["message1"])) {
        $key = $_GET["message1"];
        $tt = 0;
        if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
            echo '<script type="text/javascript">
          $(document).ready(function(){
            let feedback =  document.getElementById("feedback").value;
              swal({
                  type: "error",
                  title: "Error",
                  text: feedback,
                  showConfirmButton: true,
                  
              })
          });
          </script>
          ';
            $_SESSION["lack_of_intfund_$key"] = 0;
        }
    }
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Farm Survey</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Business
            </div>



            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-users"></i>
                    <span>Cluster Evacuation Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Collect Data:</h6>
                        <?php
                        if ($findRights['approval'] == 1) {
                        ?>
                            <a class="collapse-item" href="farmer_approval.php">Farmer Approval</a>
                        <?php
                        }
                        if ($findRights['register_farmer'] == 1) {
                        ?>
                            <a class="collapse-item" href="farmers.php">Farmers</a>
                        <?php
                        }
                        if ($findRights['view_report'] == 1) {
                        ?>
                            <!-- <a class="collapse-item" href="investors.php">Investors</a> -->
                        <?php
                        }
                        ?>
                        <!-- <a class="collapse-item" href="request.php">Requests</a> -->

                    </div>
                </div>
            </li>

            <!-- Nav Item - Reports -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-fw fa-cog"></i>
                    <span><?php echo date('Y') ?>Cluster Data</span>
                </a>
                <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All Reports:</h6>
                        <?php
                        if ($findRights['view_report'] == 1) {
                        ?>
                            <a class="collapse-item" href="cluster_hectares_report.php">Cluster Farm Size in <br> Hectares (HA) Data</a>
                            <a class="collapse-item" href="input_inventory.php">Input Inventory Data</a>
                            <a class="collapse-item" href="input_distrubition.php">Input Distribution Data</a>
                            <a class="collapse-item" href="#">Incidence Reports</a>
                            <a class="collapse-item" href="#">Weekly reports</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Reports -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All Reports:</h6>
                        <?php
                        if ($findRights['view_report'] == 1) {
                        ?>
                            <a class="collapse-item" href="cluster_report.php">Cluster</a>
                            <a class="collapse-item" href="farmers_report.php">Farmers</a>
                            <a class="collapse-item" href="farm_report.php">Farms</a>
                            <a class="collapse-item" href="warehouse_report.php">Warehouse</a>
                            <a class="collapse-item" href="Survey_report.php">Survey</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Reports -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Database</span>
                </a>
                <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Database Management:</h6>
                        <?php
                        if ($findRights['view_report'] == 1) {
                        ?>
                            <a class="collapse-item" href="farmer_import.php">Import Farmers</a>
                            <a class="collapse-item" href="import.php">Import Farmers and Farm</a>
                            <!-- <a class="collapse-item" href="loans.php">Import Warehouse</a>
                            <a class="collapse-item" href="loans.php">Import Survey</a> -->
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                System
            </div>
            <?php
            if ($findRights['users_management'] == 1) {
            ?>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>System</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">System Configuration:</h6>
                            <a class="collapse-item" href="cluster.php">Cluster</a>
                            <a class="collapse-item" href="questions.php">Questions</a>
                            <a class="collapse-item" href="training.php">Training</a>
                            <a class="collapse-item" href="farm_items.php">Farm Items</a>
                            <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                        </div>
                    </div>
                </li>



                <!-- Nav Item - Tables -->

                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-user"></i>
                        <span>Users</span></a>
                </li>
            <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php
                                $findUnAprrovedClients = selectAll('survey_data', ['status' => 0]);
                                $unApprovedLoan = selectAll('farmer', ['status' => 0]);
                                $unApprovedInvestment = selectAll('loans', ['status' => 0]);

                                $totalAlerts = count($findUnAprrovedClients) + count($unApprovedLoan) + count($unApprovedInvestment);
                                if ($totalAlerts > 0) {
                                ?>
                                    <span class="badge badge-danger badge-counter"><?php echo $totalAlerts  ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-danger badge-counter"></span>
                                <?php
                                }
                                ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="farmer_approval.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo count($unApprovedLoan)  ?></div>
                                        Farmer Awaiting Approval!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="loan_approval.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo count($unApprovedInvestment)  ?></div>
                                        Yet to approve these Loans!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="survey_approval.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo count($findUnAprrovedClients)  ?></div>
                                        UnApproved survey.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">As at Today - <span class="font-weight-bold"><?php echo date('Y-M-d') ?></span></a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->