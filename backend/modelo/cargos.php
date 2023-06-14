<?php 
// usado para encontrar errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("../controlers/konfij.php");

$data = new Cargo();/* creamos nueva clase de config */
$allData = $data->selectAll();

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <title>Constructora</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../frontend/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../../frontend/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../../frontend/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="../../frontend/index.php">
            <span>
              Cargos Empleados
            </span>
          </a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="login.php">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="constructora.php"> Constructora <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="" dropdownMenu="v1" data-bs-toggle="dropdown" aria-expanded="false">
                      <a class=" " href=""> Empleados </a>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="v1">
                      <li><a class="dropdown-item" href="cargos.php">Cargos</a></li>
                      <li><a class="dropdown-item" href="empleados.php">Empleados</a></li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cliente.php"> Cliente </a>
                </li>
                
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="" dropdownMenu="v2" data-bs-toggle="dropdown" aria-expanded="false">
                    <a class="" href="#">Inventario</a>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="v2">
                      <li><a class="dropdown-item" href="marca.php">Marcas</a></li>
                      <li><a class="dropdown-item" href="categoria.php">Categoria</a></li>
                      <li><a class="dropdown-item" href="productos.php">Productos</a></li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="cotizacion.php"><i class="bi bi-receipt"> </i> Cotizacion</a>
                </li>
              </ul>
            </div>
          </div>
          <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
          </form>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 pt-5 mt-5 text-center">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger m-4 float-end" data-bs-toggle="modal" data-bs-target="#registrarProducto">
                    Registrar nuevo cargo
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="registrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title mt-5 bg-success" id="exampleModalLabel">Nuevo Cargo</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="col d-flex flex-wrap" action="../controlers/rejitro.php" method="post">
                            <div class="mb-1 col-12">
                              <label for="nombre" class="form-label">Nombre del cargo</label>
                              <input 
                                type="text"
                                placeholder="Ingrese el nombre del cargo"
                                id="nombre"
                                name="nombre"
                                class="form-control"
                                required
                              />
                            </div>
                            
                            <div class=" col-12 m-2">
                              <button type="submit" class="btn btn-primary" value="cargos" name="guardar">Agregar Cargo</button>
                            </div>

                          </form>  
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <table class="table table-custom ">
                    <thead>
                      <tr>
                        <th class="barra .text-light" scope="col">#</th>
                        <th class="barra .text-light" scope="col">NOMBRE DEL CARGO</th>
                        <th class="barra .text-light" scope="col">BORRAR</th>

                        <!-- <th class="barra" scope="col">EDITAR</th> -->
                      </tr>
                    </thead>
                    <tbody class="" id="tabla">
                      <?php
                        foreach ($allData as $key => $val){
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
                      ?>
                      <tr>
                        <td> <?= $val['id_cargo']; ?></td>
                        <td> <?= $val['nombre']; ?></td>
                        <td><a href="../controlers/borar.php?id=<?= $val['id_cargo'] ?>&req=deletecargo" class="<?= $but ?>"><i class="bi bi-trash3"></i>Borrar</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript" src="../../frontend/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../frontend/js/bootstrap.js"></script>
</body>

</html>