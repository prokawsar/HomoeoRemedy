<?php
include 'retrieve_data.php';
if($_GET){
    $sql = "UPDATE remedy_order SET status=1 WHERE order_id=". $_GET['deliver'];
    $conn->query($sql);
}
?>
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="jumbotron">
            <div class="text-capitalize pull-right">After delivery your product, Please click on Delivered.</div>
            <div class="container">
                <div class="row">
                    <h3>Your Orders</h3>
                    <div style="margin-top: 10px"></div>
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Price</th>
                            <th>Estimated Delivery Date</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>Price</th>
                            <th>Estimated Delivery Date</th>
                            <th>Status</th>

                        </tr>
                        </tfoot>
                        <tbody>

                        <?php

                        while($row = mysqli_fetch_assoc($order_data_id)) {
                            $order_id = $row['order_id'];
                            echo " <tr>
                             <td>".$order_id."</td>
                            <td>৳".$row['total_price']."</td>
                             <td>".date('d-m-Y',strtotime('+15 day',strtotime($row['order_date'])))."</td>";

                            if($row['status']== 0) {
                                echo "<td><a href='index.php?deliver=$order_id' class='sc-add-to-cart btn btn-default'>Delivered</a> </td>
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
        </div>
    </div>
    <!-- Main content -->
</div>