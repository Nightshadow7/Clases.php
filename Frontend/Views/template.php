<?php
$routes = explode("/",$_SERVER["REQUEST_URI"]);
$routes = array_filter($routes);

print_r($routes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Psycologist</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/assets/plugins/adminlte/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="Views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="Views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="Views/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- jQuery -->
<script src="Views/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="Views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Views/assets/plugins/adminlte/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="Views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="Views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="Views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="Views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="Views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="Views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="Views/assets/plugins/jszip/jszip.min.js"></script>
<script src="Views/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="Views/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="Views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="Views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="Views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
      if(!empty($routes[3])){
        if ($routes[3] == "clinicHistory" ||
            $routes[3] == "interviews" ||
            $routes[3] == "psychologist" ||
            $routes[3] == "tratment" ||
            $routes[3] == "users") {
           require_once "Views/pages/".$routes[3]."/".$routes[3].".php";
        }
      }else{
         require_once "Views/pages/home/home.php";
      }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?= require_once("Views/modules/footer.php");?>
</div>
<!-- ./wrapper -->


</body>
</html>
