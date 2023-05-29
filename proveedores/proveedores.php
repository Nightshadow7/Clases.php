<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Supermarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font icons -->
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	  <link rel="stylesheet" href="../assets/css/rubic.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="pro.css">
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
                        <a class="nav-link" href="../categorias/categorias.php">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../clientes/clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../empleados/empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../productos/productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="../facturacion/facturacion.php"><i class="bi bi-receipt"> </i> Facturacion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 pt-5 mt-5 text-center">
                  <table class="table table-custom ">
                    <thead>
                      <tr>
                        <th class="barra" scope="col">#</th>
                        <th class="barra" scope="col">NOMBRE</th>
                        <th class="barra" scope="col">TELEFONO</th>
                        <th class="barra" scope="col">CIUDAD</th>
                        <th class="barra" scope="col">BORAR</th>
                      </tr>
                    </thead>
                    <tbody class="" id="tabla">
                      <tr>
                        <!-- <td> $val['id_proveedor']; ?></td>
                        <td> $val['nombre_proveedor']; ?></td>
                        <td> $val['telefono_proveedor']; ?></td>
                        <td> $val['ciudad_proveedor']; ?></td> -->
                        <td><a href="borrarProveedores.php?id=<?= $val['id'] ?>&req=delete" class="<?= $but ?>"><i class="bi bi-trash3"></i>Borrar</a></td>
                        <td><a href="actualizarProveedores.php?id=<?= $val['id']?>" class="<?= $bot?>"><i class="bi bi-pencil"></i>Editar</a></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="registrarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5 pt-5 mt-5 barra" id="exampleModalLabel">Nuevo Proveedor</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarEstudiantes.php" method="post">
              <div class="mb-1 col-12">
                <label for="nombre_" class="form-label">Nombres</label>
                <input 
                  type="text"
                  placeholder="Dijite su nombre"
                  id="nombres"
                  name="nombres"
                  class="form-control"
                  required
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input 
                  type="text"
                  placeholder="Ingrese su direccion"
                  id="direccion"
                  name="direccion"
                  class="form-control" 
                  required
                />
              </div>

              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Logros</label>
                <input 
                  type="text"
                  placeholder="Ingrese sus logros"
                  id="logros"
                  name="logros"
                  class="form-control" 
                  required
                />
              </div>

              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Review</label>
                <select required class="form-select" aria-label="Default select example" name="review">
                  <option selected>Valoracion de review</option>
                  <option value="Exelente">Excelente</option>
                  <option value="Bueno">Bueno</option>
                  <option value="Aceptable">Aceptable</option>
                  <option value="Regular">Regular</option>
                  <option value="Podria Mejorar">Podria Mejorar</option>
                  <option value="Horrible">Horrible</option>
                  <option value="Inaceptable">Inaceptable</option>
                </select>
              </div>

              <div class="mb-1 col-6">
                <label for="logros" class="form-label">Ser</label>
                <input 
                  type="number"
                  placeholder="Nota de ser"
                  id="ser"
                  name="ser"
                  class="form-control"  
                  required
                />
              </div>

              <div class="mb-1 col-6">
                <label for="logros" class="form-label">Ingles</label>
                <select required class="form-select" aria-label="Default select example" name="ingles">
                  <option selected>Nivel de ingles</option>
                  <option value="A1">A1</option>
                  <option value="A2">A2</option>
                  <option value="B1">B1</option>
                  <option value="B2">B2</option>
                  <option value="C1">C1</option>
                  <option value="C2">C2</option>
                </select>
              </div>

              <div class="mb-1 col-6">
                <label for="logros" class="form-label">Skills</label>
                <input 
                  type="number"
                  placeholder="Nota de skills"
                  id="skills"
                  name="skills"
                  class="form-control"
                  required
                />
              </div>

              <div class="mb-1 col-6">
                <label for="logros" class="form-label">Asistencia</label>
                <select required class="form-select" aria-label="Default select example" name="asistencia">
                  <option selected>Asistencia</option>
                  <option value="Review">Review</option>
                  <option value="Ser">Ser</option>
                  <option value="Ingles">Ingles</option>
                  <option value="Skills">Skills</option>
                  <option value="Ninguna">Ninguna</option>
                </select>
              </div>
              
            

              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Especialidad</label>
                <select required class="form-select" aria-label="Default select example" name="especialidad">
                  <option selected>Especialidad</option>
                  <option value="Front-End">Front-End</option>
                  <option value="Back-End">Back-End</option>
                  <option value="Full-Stack">Full-Stack</option>
                </select>
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>
    <!-- <div class="social-wrapper" id="features">
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
    </div> -->
    
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>


    <script src="../assets/js/rubic.js"></script>

</body>
</html>