<!DOCTYPE html>
<html lang="en">
  <head>
   
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url();?>assets/img/newrealJansen.png" type="image/ico" />

    <title>Welcome to JI</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/Backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/Backend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar -->
        <?php $this->load->view('layout/Sidebar');?>
        <!-- end of sidebar -->

        <!-- top navigation -->
        <?php $this->load->view('layout/Topnav'); ?>
        <!-- /top navigation -->

        <!-- @content -->
            <?php echo $contents; ?>
        <!-- @endcontent -->

        <!-- footer content -->
        <?php $this->load->view('layout/Footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

       <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/iCheck/icheck.min.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- ECharts -->
    <script src="<?php echo base_url();?>assets/Backend/vendors/echarts/dist/echarts.min.js"></script>
    <script src="<?php echo base_url();?>assets/Backend/vendors/echarts/map/js/world.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/Backend/build/js/custom.min.js"></script>
    
  </body>
</html>
