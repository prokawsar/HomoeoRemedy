<?php session_start();
if(!isset($_SESSION['admin'])){
    header('location: ../login.php');
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
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
<br>
<div class="panel">
    <h1 class="text-center">Welcome to Admin Dashboard</h1>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content">

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $total_order->num_rows; ?></h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $user_data->num_rows; ?></h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>76</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <?php if($_GET){
                    if(isset($_GET['rem_id'])) {
                        $sql = "DELETE from medicine WHERE remedy_id=" . $_GET['rem_id'];
                        $conn->query($sql);

                            echo "<div class=\"box-body text-center\">
                        <div class=\"callout callout-warning\">
                                <p>Medicine successfully deleted.</p>
                            </div>
                        </div>";
                    }
                } ?>

                <h3>All Medicine</h3>
                <div style="margin-top: 30px"></div>
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Potency</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Potency</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    <?php
                    while($row = mysqli_fetch_assoc($medicine_details)) {
                    echo    "<tr><td>".$row['remedy_name']."</td>
                            <td>".$row['remedy_type_name']."</td>
                        <td>".$row['med_power']."</td>
                        <td>".$row['price']."</td>
                        <td><a href='add_remedy.php?id=".$row['remedy_id']."' class='btn btn-default'>Edit</a> </td>
                        <td><a href='index.php?rem_id=".$row['remedy_id']."' class='btn btn-danger'>Delete</a></td></tr>";
                    }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>

        <div class="jumbotron">
            <div class="container">
                <h3>Delivery Order</h3>
                <div style="margin-top: 30px"></div>
                <table id="medicine_order" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                    <tbody>
<!--                    Should output same details-->
                        <?php

                        while($row = mysqli_fetch_assoc($order_details)) {

                            echo " <tr>
                             <td>".$row['name']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['address']."</td>
                            <td>৳".$row['total_price']."</td>
                         
                             <td>".date('d-m-Y',strtotime($row['order_date']))."</td>";

                            if($row['status']== 0) {
                                echo "<td><a class='sc-add-to-cart btn btn-info'>Pending</a> </td>
                                          </tr>";
                            }else{
                                echo "<td><a class='sc-add-to-cart btn btn-success fa fa-check'> Delivered</a> </td>
                                          </tr>";
                            }

                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- Main content -->
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
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#medicine_order').DataTable();
    } );
</script>
</body>
</html>
