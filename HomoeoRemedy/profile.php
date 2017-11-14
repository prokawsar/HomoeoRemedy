<?php session_start();
include "connection.php";
$sql = "SELECT * from users WHERE user_id=".$_SESSION['ID'];
$profile = $conn->query($sql);
$data = array();

foreach($profile as $row) {
    $data[0] = $row['name'];
    $data[1] = $row['email'];
    $data[2] = $row['phone'];
    $data[3] = $row['address'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRS | Homoeo Remedies Seller</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">

    <!-- Body Font make Larger also for Plugin -->
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/stylesheet.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">


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
<body class="hold-transition skin-purple ">

<!-- Main Header -->

<?php

include 'header.php';
    ?>
    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="container">
                <div class="container">
                    <div class="jumbotron">
                    <div class="row">
                        <button class="btn btn-default pull-right">Edit Profile</button>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h1 class="text-center">Your Profile</h1>
                            <div style="margin-top: 30px;"></div>
                            <div class="box">
                                <div class="box-header text-center">
                                    <img src="dist/img/img.png">
                                </div>

                                <div class="box-body no-padding">

                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Name: </td>
                                            <td><?php echo $data[0]; ?></td>

                                        </tr>
                                        <tr>
                                            <td>Email: </td>
                                            <td><?php echo $data[1]; ?></td>

                                        </tr>
                                        <tr>
                                            <td>Phone: </td>
                                            <td><?php echo $data[2]; ?></td>

                                        </tr>
                                        <tr>
                                            <td>Address: </td>
                                            <td><?php echo $data[3]; ?></td>

                                        </tr>
                                        </tbody></table>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main content -->
    </div>

<!-- Main Footer -->
<?php include 'footer.php'; ?>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

</body>
</html>
