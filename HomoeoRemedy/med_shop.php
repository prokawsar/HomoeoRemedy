<?php
session_start();
include_once ('retrieve_data.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRS | Shop</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">

 <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/stylesheet.css">
    <!-- Include SmartCart CSS -->
    <link href="dist/css/smart_cart.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body class="hold-transition skin-purple">
  <?php include 'header.php'; ?>

  <div class="login-logo">
    <a><b>Remedy</b>Shop</a>
</div>

  <div class="content">
      <div class="container">

          <div class="row">
              <h3>All Medicine</h3>
              <div style="margin-top: 10px"></div>
              <p >Medicines are imported from Germany. </p>
              <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Potency</th>
                      <th>Price</th>
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

                  </tr>
                  </tfoot>
                  <tbody>

                  <?php
                  $id = 0;
                  while($row = mysqli_fetch_assoc($medicine_details)) {
                      $id++;
                 echo " <tr class='sc-product-item'>
                      <input type=\"hidden\"  data-name=\"product_name\" value=\"".$row['remedy_name']."\" />
                      <input type=\"hidden\" data-name=\"product_type\" value=\"".$row['remedy_type_name']."\"  />
                      <input type=\"hidden\" name=\"product_price\" value=\"".$row['price']."\"  />
                      <input type=\"hidden\" name=\"product_id\" value=\"".$id."\"  />
                         <td>".$row['remedy_name']."</td>
                        <td>".$row['remedy_type_name']."</td>
                        <td>".$row['med_power']."</td>
                        <td>৳".$row['price']."</td>
                      <td><button class='sc-add-to-cart btn btn-default'>Add to Cart</button> </td>
                  </tr>";

                   }
                  ?>

                  </tbody>
              </table>
          </div>
<!--           END REMEDY TABLE ROW-->

          <div style="margin-top: 50px"></div>
          <div class="row">
                <div class="col-lg-3">
                </div>
              <div class="col-md-6">
                  <aside class="col-md-12">
                      <!-- Cart submit form -->
                      <form action="remedy_invoice.php" method="POST">
                          <!-- SmartCart element -->
                          <div id="smartcart"></div>
                      </form>

                  </aside>
              </div>

      </div>
  </div>

      <div style="margin-top: 50px"></div>
 <?php include 'footer.php'; ?>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/select2.full.min.js"></script>
  <!-- Include SmartCart -->
  <script src="dist/js/jquery.smartCart.min.js" type="text/javascript"></script>
  <!-- Initialize -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
      $(function () {

          $('#example').DataTable();

      });
      $(document).ready(function(){
          // Initialize Smart Cart
          $('#smartcart').smartCart();
      });
  </script>



</body>
</html>
