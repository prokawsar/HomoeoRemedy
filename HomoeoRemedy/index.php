<?php session_start(); ?>

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
   if(isset($_SESSION['username'])){
        include ('user_home.php');
   }else{

   ?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <!-- Indicators -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="dist/img/image1.jpg" alt="slide image" width="950" height="400">
                        <div class="carousel-caption">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="dist/img/image2.jpg" alt="slide image" width="950" height="400">
                        <div class="carousel-caption">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="dist/img/image3.jpg" alt="slide image" width="950" height="400">
                        <div class="carousel-caption">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </div>

  <div class="jumbotron">
      <div class="content">
          <h1>How Homeopathy Treatment</h1>
          <br><br>
          <p class="text-justify">
              Homeopathy treatment is a natural form of medicine based on the principle of symptom similarity. Homeopathic remedies are derived from natural sources and are diluted and potentized to make them safe.
              Homeopathic treatment, when taken from a professional homeopathy doctor, is usually safe and without any side effects.<br><br> Homeopathic literature says that when a remedy, which covers your symptoms very well, is administered, it is able to affect a cure rapidly and gently, even of long standing and inveterate cases.
              Before you start homeopathy treatment for any health condition, make sure that you consult your general physician or a qualified homeopath in person.
          </p>
      </div>

  </div>
    <div class="jumbotron " style="background-color: #605CA8 !important; color: white; ">
        <h1>Our Services</h1>
        <div class="content" ">
            <div class="col-md-4">
                <h3>Selling Homoeo Remedy</h3>
                <ul class="box-body">
                    <p>Dilutions</p>
                    <p>Bio-Chemics</p>
                    <p>Mother Tincture</p>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Primary Remedy Suggestion</h3>
            </div>
            <div class="col-md-4">
                <h3>Remedy Review</h3>
            </div>
        </div>
    </div>
    <!-- Main content -->
</div>
    <!-- /.content -->
  <?php
  }
  ?>
  <!-- Main Footer -->
  <?php include 'footer.php'; ?>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
      $(function () {

          $('#example').DataTable();

      });
  </script>
</body>
</html>
