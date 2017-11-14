<?php
  session_start();
  
  if($_SESSION){
    $email = $_SESSION["email"];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS| Log in</title>
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
   <link rel="stylesheet" href="../dist/css/skins/skin-purple.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">


  <!-- For Plugin -->
  <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/standalone/selectize.js"></script>
    <script src="js/index.js"></script>
 
</head>
<body class="hold-transition skin-purple">
  <?php include '../header.php'; ?>

<div class="login-logo">
    <a><b>Medicine</b>Suggestion</a>
  </div>

  
</div >

<div class="row">
<div class="col-md-3">

</div>
 <div class="nav-tabs-custom col-md-6">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Get Primary Treatment</a></li>
             
            </ul>
            <div class="tab-content">
              
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
         
                <!-- form start -->
                <form action="" role="form" method="post">
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label >Symptoms</label>
                      <textarea class="form-control" rows="3" placeholder="Be real here"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="select-state">Tags:</label>
                      <select id="select-state" multiple name="state[]" class="demo-default" style="width:50%">
                        <option value="">Select a state...</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
              
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                      </select>
                    </div>
                    
               

                  <script>
        var eventHandler = function(name) {
          return function() {
            console.log(name, arguments);
            $('#log').append('<div><span class="name">' + name + '</span></div>');
          };
        };
        var $select = $('#select-state').selectize({
          create          : false,
          maxItems    : 4,
          onChange        : eventHandler('onChange'),
          onItemAdd       : eventHandler('onItemAdd'),
          onItemRemove    : eventHandler('onItemRemove'),
          onOptionAdd     : eventHandler('onOptionAdd'),
          onOptionRemove  : eventHandler('onOptionRemove'),
          onDropdownOpen  : eventHandler('onDropdownOpen'),
          onDropdownClose : eventHandler('onDropdownClose'),
          onFocus         : eventHandler('onFocus'),
          onBlur          : eventHandler('onBlur'),
          onInitialize    : eventHandler('onInitialize'),
        });
        </script>
                     
                  </div>

                    

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
             
              </div>
              <!-- /.tab-pane -->
        
          </div>
            <!-- /.tab-content -->
          </div>

          <div class="col-md-3">

          </div>
           </div>
 <?php include '../footer.php'; ?>


<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
