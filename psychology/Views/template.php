<?php
$routes = explode("/",$_SERVER["REQUEST_URI"]);
$routes = array_filter($routes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Sidebar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/assets/plugins/adminlte/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?= require_once("Views/modules/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?= require_once("Views/modules/sidebar.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    print_r($routes);
      if(!empty($routes[4])){
        if ($routes[4] == "clinicHistory" ||
            $routes[4] == "interviews" ||
            $routes[4] == "psychologist" ||
            $routes[4] == "tratment" ||
            $routes[4] == "users") {
           include "Views/pages/".$routes[4]."/".$routes[4].".php";
        }
      }else{
         include "Views/pages/home/home.php";
      }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?= require_once("Views/modules/footer.php");?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="Views/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="Views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Views/assets/plugins/adminlte/js/adminlte.min.js"></script>
</body>
</html>
