<?php

include('header.php');


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">IMPORT</h1>

    <div class="row">
        <!-- input cluster -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">Import Cluster Data</h6>
                    </div>
                    <div style="float:right">
                        <a href="assets/Cluster Head Data.xlsx" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Template</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php //echo $_SESSION['feedback'] 
                    ?>
                    <form action="functions/system/process/import_cluster.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- input inventory -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">Import Input Inventory</h6>
                    </div>
                    <div style="float:right">
                        <a href="assets/MAAN Inputs Inventory Form.xlsx" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Template</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php //echo $_SESSION['feedback'] 
                    ?>
                    <form action="functions/system/process/import_inventory.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- input distrubition -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div style="float:left">
                        <h6 class="m-0 font-weight-bold text-primary">Import Distrubition</h6>
                    </div>
                    <div style="float:right">
                        <a href="assets/MAAN Inputs distribution Form.xlsx" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Template</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php //echo $_SESSION['feedback'] 
                    ?>
                    <form action="functions/system/process/import_distrubition.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->


<?php

include('footer.php');

?>