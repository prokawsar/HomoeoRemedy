<?php
$product_list = json_decode(file_get_contents('remedy_order.txt'));
unlink('remedy_order.txt');
$no_of_remedy = count($product_list);

$id = $_SESSION['ID'];
$sql = "INSERT into remedy_order (user_id) VALUES ('$id')";
$conn->query($sql);

$sql = "SELECT order_id from remedy_order WHERE user_id =". $id;
$order_id = $conn->query($sql);

while($row = mysqli_fetch_assoc($order_id)) {
    $orderID = $row['order_id'];
}

$i=0;
$total = 0;
for($i=0; $i<$no_of_remedy; $i++) {
    $remedy_id = $product_list[$i]->product_id;
    $quantity = $product_list[$i]->product_quantity;
    $sub_total = $product_list[$i]->product_price * $product_list[$i]->product_quantity;
    $total += $sub_total;
    $sql = "INSERT into order_line (order_id, remedy_id, quantity, subprice) VALUES ('$orderID', '$remedy_id','$quantity', '$sub_total')";
    $conn->query($sql);

}
$total += $total*0.15+200;
$sql = "UPDATE remedy_order SET total_price='$total' WHERE order_id=".$orderID;
$conn->query($sql);

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
        <div class="content">
            <div class="col-md-12 invoice-col">
                <?php echo "<b class='lead'>Order ID: ".$orderID." </b><br>"; ?>
                <p class="lead"> Your Order has been Placed. Wait 15 days to deliver your Products.</p>
                <p>Continue <a href="med_shop.php" class="link-muted">Remedy order</a> or Check you order List.</p>
            </div>
        </div>

    </div>



</section>