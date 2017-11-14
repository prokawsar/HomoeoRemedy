<?php session_start();
if(isset($_SESSION['ID'])){
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
   <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="dist/css/stylesheet.css">

    <link rel="stylesheet" type="text/css" href="style.css" />



</head>
<body class="hold-transition skin-purple">
  <?php include 'header.php';

   ?>

<div class="register-box">
  <div class="register-logo">
    <a href="index.html"><b>Homoeo</b>Remedy</a>
  </div>

  <div class="register-box-body">
    <?php 
    if(!empty($_SESSION['errMsg'])) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          <?php
            echo $_SESSION['errMsg'];
         
           } ?>
        </div>

    <?php unset($_SESSION['errMsg']); ?>
    <p class="login-box-msg">Register a new membership</p>

    <form action="reg_complete.php" method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            <div align="left" id="status"></div>
            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Phone" name="phone" required>
            <span class="glyphicon glyphicon-star form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full Address" name="address" required>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>


      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>

<!--    <a href="login.php" class="text-center">I already have a membership</a>-->
      <div class="social-auth-links text-center">
          <p> OR </p>
          <a href="login.php" class="btn btn-warning text-center">I already have a membership</a>
      </div>
  </div>
  <!-- /.form-box -->
</div>
 <?php include 'footer.php'; ?>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>


  <script type="text/javascript" src="dist/js/jquery-1.2.6.min.js"></script>

  <script type="text/javascript">
      pic1 = new Image(16, 16);
      pic1.src = "loader.gif";

      $(document).ready(function(){

          $("#username").change(function() {

              var usr = $("#username").val();

              if(usr.length >= 4) {
                  $("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

                  $.ajax({
                      type: "POST",
                      url: "username_check.php",
                      data: "username="+ usr,
                      success: function(msg){

                          $("#status").ajaxComplete(function(event, request, settings){

                              if(msg == 'OK') {
                                  $("#username").removeClass('object_error'); // if necessary
                                  $("#username").addClass("object_ok");
                                  $(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
                              }
                              else {
                                  $("#username").removeClass('object_ok'); // if necessary
                                  $("#username").addClass("object_error");
                                  $(this).html(msg);
                              }

                          });
                      }
                  });
              }
              else
              {
                  $("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
                  $("#username").removeClass('object_ok'); // if necessary
                  $("#username").addClass("object_error");
              }

          });

      });

  </script>
</body>
</html>
