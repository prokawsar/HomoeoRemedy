<?php session_start();
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}
include_once ( '../retrieve_data.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-green.css">

    <!-- Body Font make Larger also for Plugin -->
    <link rel="stylesheet" href="../dist/css/normalize.css">
    <link rel="stylesheet" href="../dist/css/stylesheet.css">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green ">

<!-- Main Header -->

<?php

include 'admin_header.php'; ?>
<!-- Left side column. contains the logo and sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div style="margin-top: 30px"></div>
            <?php if(isset($_SESSION['msg'])) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php
                echo $_SESSION['msg'];
                echo "</div>";
                } unset($_SESSION['msg']); ?>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Medicine</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="add_comp.php<?php if(isset($type_id))echo '?update=yes'; ?>" method="post" class="form-horizontal">
                    <div class="box-body">
                        <input type="hidden" value="<?php if($_GET)  echo $_GET['id']; ?>" name="med_id">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Remedy Name: </label>

                            <div class="col-sm-10">
                                <input type="text" name ="med_name" class="form-control"  value="<?php if(isset($med_name))  echo $med_name; ?>" placeholder="Medicine Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Potency</label>

                            <div class="col-sm-10">
                                <select name ="med_potency" class="form-control" required>
                                <option value="">Select Potency</option>
                                    <?php
                                    while($row = mysqli_fetch_assoc($med_power)) {
                                        if(isset($pow_id) && $pow_id == $row['pow_id']){
                                            echo    "<option value=".$row['pow_id']." selected>".$row['med_power']."</option>";
                                        }else
                                            echo    "<option value=".$row['pow_id'].">".$row['med_power']."</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Remedy Type</label>

                            <div class="col-sm-10">
                                <select name ="med_type" class="form-control" required>
                                    <option value="">Select Type</option>

                                    <?php
                                    while($row = mysqli_fetch_assoc($med_type)) {
                                        if(isset($type_id) && $row['type_id'] == $type_id){
                                            echo    "<option value=".$row['type_id']." selected>".$row['remedy_type_name']."</option>";
                                        }else
                                            echo    "<option value=".$row['type_id'].">".$row['remedy_type_name']."</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price:</label>

                            <div class="col-sm-10">
                                <input type="text" name ="price" class="form-control" value="<?php if(isset($price))  echo $price; ?>" placeholder="Price" required>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-info pull-right"><?php if(isset($type_id)) echo "Update"; else echo "Add New"; ?></button>
                    </div>
                </form>
                <div style="margin-top: 30px"></div>
                    <!-- /.box-footer -->
                <form action="add_comp.php" method="post">
                    <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Potency</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Potency</label>

                                <div class="col-sm-10">
                                    <input type="text" name ="new_potency" class="form-control" placeholder="Potency" required>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Add New Potency</button>
                    </div>
                </form>

                <div style="margin-top: 30px"></div>
                <form action="add_comp.php" method="post">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Delete Existing Potency</h3>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Potency</label>

                                    <div class="col-sm-10">
                                        <select name ="pow_id" class="form-control" required>
                                            <option value="">Select Potency</option>
                                            <?php
                                            foreach ($med_power as $row) {
                                                echo    "<option value=".$row['pow_id'].">".$row['med_power']."</option>";
                                            }
                                            ?>
                                        </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Delete Potency</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<?php include '../footer.php'; ?>

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
