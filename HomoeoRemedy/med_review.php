<?php session_start(); 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRS | Remedy Review</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css for tags -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  
  <link rel="stylesheet" href="dist/css/tagsinput.min.css">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  
   <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
   <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<link rel="stylesheet" href="dist/css/normalize.css">
<link rel="stylesheet" href="dist/css/stylesheet.css">
  
 
</head>
<body class="hold-transition skin-purple">
  <?php include 'header.php';
  include 'functions.php'; ?>

  <div class="login-logo">
    <a><b>Remedy</b>Review</a>
  </div>

<div class="container container-fluid">

  <p>  </p>
  <div class="row">
    <div class="col-sm-3 col-md-4 col-lg-3">
        <div class="box box-widget ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="box-header bg-purple">
                <h3 class="widget-user-username">Recently Reviewed</h3>
            </div>

            <div class="box-footer no-padding">
                <div class="box-body">
                    <ul class="nav nav-stacked">
                    <?php
                    $i = 0;
                    if($review_details){
                    foreach($review_details as $row){
                        $data= $row['review'];
                        $med_name = $row['med_name'];
                        if($i > 10) break;
                        $i++;
                    ?>

                    <li><a href="med_review.php?data=<?=$data?> & med=<?=$med_name?>& user=<?=$row['name']?>"> <h3><?=$med_name;?></h3> </a></li>

                    <?php }
                    } else{
                      echo "No Reveiw";
                    }?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-6 col-md-4 col-lg-6" style="background-color:light-gray;">
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Reviewed Post</a></li>
              
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Make a Review</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                <p> <?php

                  if($_GET){
                      $med_name = $_GET['med'];
                      $data = $_GET['data'];
                      $user = $_GET['user'];
                      ?>
                      <div class="box box-success">
                      <div class="box box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title"><?php echo $med_name .'<br>'; ?></h3>
                            <small>Reviewed by (<?php echo $user; ?>)</small>
                        </div>
                        
                        <div class="box-body">
                          <b>Patient Review: </b>
                          <?php
                            echo $data;
                            $data= null;  
                            ?>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      </div>
                      
                      <?php
                      } 
                    else{
                      $i = 0;
                      if($review_details){
                      foreach($review_details as $row){
                        $data= $row['review']; 
                        $med_name = $row['med_name'];
                          if($i > 10) break;
                          $i++;
                    ?>
                     <div class="box box-primary">
                      <div class="box box-solid ">
                        <div class="box-header with-border">
                          <h3 class="box-title"><?php echo $med_name .'<br>'; ?></h3>
                            <small>Reviewed by (<?=$row['name']?>)</small>
                        </div>
                        <div class="box-body">
                          <b>Patient Review: </b>
                          <?php
                            echo $data;
                            $data= null;  
                           ?>
                        </div>
                        <!-- /.box-body -->
                      </div>
                       </div>
                        
                    <?php
                    }
                  }else{
                    echo "No Reveiw";
                  }
                  }
                     ?>

         
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
                <?php if (isset($_SESSION['username'])) { ?>
                <!-- form start -->
                <form action="save_review.php" role="form" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label >Medicine Name</label>
                      <input type="text" class="form-control" id="med_name" placeholder="Medicine Name" name="med_name">
                    </div>
                    <div class="form-group">
                      <label >Review</label>
                      <textarea class="form-control" rows="3" placeholder="Be real here" onkeyup="countChar(this)" name="review"></textarea>
                      <div id="charNum"></div>
                     <script src="http://code.jquery.com/jquery-1.5.js"></script>
                    <script>
                      function countChar(val) {
                        var len = val.value.length;
                        if (len >= 500) {
                          val.value = val.value.substring(0, 500);
                        } else {
                          var x = 500 - len;
                          $('#charNum').text('Char Left: ' + x );
                        }
                      };
                    </script>
                    </div>
                    <div class="form-group">
                      <label >Tags</label>
                      <input class="form-control" name="tags" id="tags" type="text" />
                    </div>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                     <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script> -->
                      
                       <script src="dist/js/tagsinput.min.js"></script> 
                      <script>
                        $("#tags").tagsInput({
                              autocomplete_url: 'auto.php'
                            });

                      </script>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
                </form>
              <?php } else {
                echo 'You have to <a href="login.php">Login</a> to make a Review.';
              }
              ?>
              </div>
              <!-- /.tab-pane -->
             
            </div>
            <!-- /.tab-content -->
          </div>
    </div>

  </div>
</div>
 <?php include 'footer.php'; ?>


   

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>


</body>
</html>
