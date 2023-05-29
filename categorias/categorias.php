<?php
  foreach ($all as $key => $val):
    $color = rand(1, 7);
    $color2 = rand(1,7);
    
    while($color===$color2):
      $color = rand(1, 7);
      $color2 = rand(1,7);
    endwhile;
    
    switch ($color):
      case 1:
        $but = "btn btn-outline-primary";
        break;
      case 2:
        $but = "btn btn-outline-secondary";
        break;
      case 3:
        $but = "btn btn-outline-success";
        break;
      case 4:
        $but = "btn btn-outline-danger";
        break;
      case 5:
        $but = "btn btn-outline-warning";
        break;
      case 6:
        $but = "btn btn-outline-info";
        break;
      case 7:
        $but = "btn btn-outline-light";
        break;
      default:
        $but = "btn btn-outline-danger";
        break;
    endswitch;

    switch ($color2):
      case 1:
        $bot = "btn btn-outline-primary";
        break;
      case 2:
        $bot = "btn btn-outline-secondary";
        break;
      case 3:
        $bot = "btn btn-outline-success";
        break;
      case 4:
        $bot = "btn btn-outline-danger";
        break;
      case 5:
        $bot = "btn btn-outline-warning";
        break;
      case 6:
        $bot = "btn btn-outline-info";
        break;
      case 7:
        $bot = "btn btn-outline-light";
        break;
      default:
        $bot = "btn btn-outline-danger";
        break;
    endswitch;
  endforeach;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Supermarket</title>
    <!-- font icons -->
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	<link rel="stylesheet" href="../assets/css/rubic.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><strong class="text-primary">SUPER</strong><span class="text-light">MARKET</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./categorias.php">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../clientes/clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../empleados/empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../proveedores/proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../productos/productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="../facturacion/facturacion.php"><i class="bi bi-receipt"></i>Facturacion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md- text-center">
                    
                </div>
            </div>
        </div>
    </header>
    <div class="social-wrapper" id="features">
        <div class="container">
            <div class="social-txt">
                <h6 class="title">Social Media</h6>
                <p class="subtitle">"Follow us to stay up-to-date with the latest news and promotions!" <br>"Connect with us on social media for exclusive content and exciting updates."</p>
            </div>
            <div class="social-links">
                <a href="javascript:void(0)" class="link"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-google"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-rss"></i></a>
            </div>
        </div>          
    </div>
    
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>


    <script src="../assets/js/rubic.js"></script>

</body>
</html>