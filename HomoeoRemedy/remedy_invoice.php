<?php
session_start();


if(!isset($_SESSION['username'])){
    header('location: login.php');
    $_SESSION['errMsg'] = "Please login to Complete your Purchase";
}
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRS | Invoice</title>
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
    <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">

    <!-- Body Font make Larger also for Plugin -->
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/stylesheet.css">

</head>

<body class="hold-transition skin-purple ">
<?php
// Get the results as JSON string
$date = date('d-m-Y');
$product_list = filter_input(INPUT_POST, 'cart_list');

// Convert JSON to array
file_put_contents("remedy_order.txt", $product_list, FILE_APPEND);

$product_list_array = json_decode($product_list);
$no_of_remedy = count($product_list_array);


//echo $product_list_array[0]->product_name; exit;
$result_html = '';
if($product_list_array) {
    foreach($product_list_array as $p){
        foreach($p as $key=>$value) {
            //var_dump($key, $value);
            $result_html .= $key.": ".$value."<br />";
        }
        $result_html .= '------------------------------------------<br />';
    }
} else {	
	$result_html .= "<strong>Cart is Empty</strong>";
}
?>
<?php include ('header.php'); ?>
<section class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET['comp'])){

                    if(isset($_SESSION['invoice'])) {
                        include('order_complete.php');
                        unset($_SESSION['invoice']);
                    }else{
                        header('location: med_shop.php');
                    }
                }else{
                    $_SESSION['invoice'] = "DONE";
                ?>
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> HomoeoRemedy, Inc.
                                <small class="pull-right">Date: <?php echo $date; ?></small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>HomoeoRemedy, Inc.</strong><br>
                                Mohammadpur, 1207<br>
                                Dhaka, Bangladesh<br>
                                Phone: +880 1915 983757<br>
                                Email: info@hrs.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <?php foreach($user_data as $row){
                                    echo "<strong>".$row['name']."</strong><br>
                                    Address: ".$row['address']."<br>
                                    Phone: ".$row['phone']."<br>
                                    Email: ".$row['email']."<br>
                                    ";
                                }?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <br>

                            <b>Payment Due Date:</b> <?php echo date('d-m-Y', strtotime("+15 days")); ?><br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Remedy Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Remedy Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=0;
                                $sub_total = 0;

                                for($i=0; $i<$no_of_remedy; $i++) {
                                    $sub_total += $product_list_array[$i]->product_price * $product_list_array[$i]->product_quantity;
                                    echo " <tr >
                                        <td>".$product_list_array[$i]->product_name."</td>
                                        <td>".$product_list_array[$i]->product_type."</td>
                                        <td>".$product_list_array[$i]->product_quantity."</td>
                                        <td>".$product_list_array[$i]->product_price."</td>
                                        <td>৳".$product_list_array[$i]->product_price * $product_list_array[$i]->product_quantity."</td>
                                     
                                </tr>";

                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->

                        <!-- /.col -->
                        <div class="col-xs-6 pull-right">


                            <div class="table-responsive">
                                <table class="table pull-right">
                                    <tbody><tr>
                                        <th style="width:52%">Subtotal:</th>
                                        <td >৳<?php echo $sub_total; ?></td>
                                    </tr>
                                    <tr>
                                        <th>VAT (15.00%)</th>
                                        <td>৳<?php echo $sub_total*0.15;?></td>
                                    </tr>
                                    <tr>
                                        <th>Transport:</th>
                                        <td>৳200</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>৳<?php echo $sub_total + $sub_total*0.15 + 200;?></td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <button type="button" onclick="window.location.href='remedy_invoice.php?comp=ok'"  class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Order
                            </button>
                            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </section>
                <?php } ?>
<!--                ELSE ENDING -->

            </div>
        </div>
    </section>

<?php include ('footer.php'); ?>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

</body>
</html>