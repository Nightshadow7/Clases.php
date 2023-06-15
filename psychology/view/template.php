<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

//capturar las rutas de la url
$routesarray = explode("/" , $_SERVER['REQUEST_URI']);
$routesarray = array_filter($routesarray);
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
  <link rel="stylesheet" href="view/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="view/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/assets/plugins/adminlte/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php 
      require_once "modules/navbar.php";
    ?>

    
  <!-- /.navbar -->

    <?php 
      require_once "modules/sidebar.php";
    ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php 
    /* echo "<pre>";
    print_r($routesarray); */
    if (!empty($routesarray[4])){
      if($routesarray[4] === "clinicHistory" || $routesarray[4] === "interviews" || $routesarray[4] === "psychologist" || $routesarray[4] === "treatment" || $routesarray[4] === "users" ){
        require_once "views/pages/".$routesArray[4]."/".$routesArray[4].".php";
      }else{
        require_once "views/pages/home/home.php";
      }
    } 
    ?>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
      require_once "modules/footer.php";
    ?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="view/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="view/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="view/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="view/assets/plugins/adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="view/assets/plugins/adminlte/js/demo.js"></script>
</body>
</html>
