<?php
// usado para encontrar errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("./funciones/configuracion.php");
// creamos una nueva clase de la configuracion para productos
$data = new Productos();
$allData = $data->selectAll();
/* sacamos las categorias*/
$category = new Categoria();
$allCategoria = $categoria->selectAll();
/* sacamos los proveedores*/
$provider = new Proveedores();
$allProvider = $provider->selectAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Productos</title>
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
                        <a class="nav-link" href="./categorias.php">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="./facturacion.php"><i class="bi bi-receipt"> </i> Facturacion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 pt-5 mt-5 text-center">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#registrarProducto">
                    Registrar Nuevo Producto
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="registrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title mt-5 bg-success" id="exampleModalLabel">Nuevo Producto</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="col d-flex flex-wrap" action="registrarProductos.php" method="post">
                            <div class="mb-1 col-12">
                              <label for="nombre_del_producto" class="form-label">Nombre del producto</label>
                              <input 
                                type="text"
                                placeholder="Ingrese el nombre de un producto"
                                id="nombre_del_producto"
                                name="nombre_del_producto"
                                class="form-control"
                                required
                              />
                            </div>

                            <div class="mb-1 col-12">
                              <label for="categoria" class="form-label">Categoria</label>
                              <select name="categoria" id="categoria" class="form-select mb-1">
                              <?php
                                foreach ($allCategoria as $key => $val): 
                                ?> 
                                <option value="<?= $val['id_categoria']?>"><?= $val['nombre_cat']?></option>
                              <?php 
                              endforeach; 
                              ?> 
                              </select>
                            </div>

                            <div class="mb-1 col-12">
                              <label for="proveedor" class="form-label">Proveedor</label>
                              <select name="proveedor" id="proveedor" class="form-select mb-1">
                              <?php
                                foreach ($allProvider as $key => $val): 
                                ?> 
                                <option value="<?= $val['id_proveedor']?>"><?= $val['nombre_proveedor']?></option>
                              <?php 
                              endforeach; 
                              ?> 
                              </select>
                            </div>

                            <div class="mb-1 col-12">
                              <label for="stock" class="form-label">Stock</label>
                              <input 
                                type="number"
                                placeholder="Dijite la cantidad de producto en inventario"
                                id="stock"
                                name="stock"
                                class="form-control" 
                                required
                              />
                            </div>

                            <div class="mb-1 col-12">
                              <label for="precio_unitario" class="form-label">Precio por Unidad</label>
                              <input 
                                type="number"
                                placeholder="Dijite El precio por unidad de producto"
                                id="precio_unitario"
                                name="precio_unitario"
                                class="form-control" 
                                required
                              />
                            </div>

                            <div class="mb-1 col-12">
                              <label for="unidades_pedidas" class="form-label">Cantidad de unidades Ordenadas</label>
                              <input 
                                type="number"
                                placeholder="Dijite la cantidad de unidades Ordenadas"
                                id="unidades_pedidas"
                                name="unidades_pedidas"
                                class="form-control" 
                                required
                              />
                            </div>

                            <div class="mb-1 col-12">
                              <label for="descontinuado" class="form-label">¿Esta descontinuado?</label>
                                <select name="descontinuado" id="descontinuado" class="form-select">
                                  <option value="no">No</option>
                                  <option value="si">Si</option>
                                </select>
                            </div>
                
                            <div class=" col-12 m-2">
                              <button type="submit" class="btn btn-primary" value="productos" name="guardar">Agregar Producto</button>
                            </div>

                          </form>  
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <table class="table table-custom ">
                    <thead>
                      <tr>
                        <th class="barra" scope="col">#</th>
                        <th class="barra" scope="col">NOMBRE</th>
                        <th class="barra" scope="col">CATEGORIA</th>
                        <th class="barra" scope="col">PROVEEDOR</th>
                        <th class="barra" scope="col">PRECIO UNIDAD</th>
                        <th class="barra" scope="col">STOCK</th>
                        <th class="barra" scope="col">UNIDADES PEDIDAS</th>
                        <th class="barra" scope="col">DESCONTINUADO</th>
                        <th class="barra" scope="col">BORRAR</th>

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
                          $nomcate = $data->nameCate($val['id_categoria']);
                          $nameprov = $data->nameProv($val['id_proveedor']);
                      ?>
                      <tr>
                        <td> <?= $val['id_producto']; ?></td>
                        <td> <?= $val['nombre_del_producto']; ?></td>
                        <td> <?= $namecate; ?></td>
                        <td> <?= $nameprov; ?></td>
                        <td> <?= $val['stock']; ?></td>
                        <td> <?= $val['precio_unitario']; ?></td>
                        <td> <?= $val['unidades_pedidas']; ?></td>
                        <td> <?= $val['descontinuado']; ?></td>
                        <td><a href="./funciones/borar.php?id=<?= $val['id_producto'] ?>&req=deleteproductos" class="<?= $but ?>"><i class="bi bi-trash3"></i>Borrar</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </header>
    
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap affix -->
	  <script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>


    <script src="../assets/js/rubic.js"></script>

</body>
</html>