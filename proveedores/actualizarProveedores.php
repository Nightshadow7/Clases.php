<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 
  require_once("configuracionProveedores.php");
  $data = new Proveedor();

  $id = $_GET['id_proveedor'];
  $data -> setId_proveedor($id);
  
  $record = $data->selectOne();
  $val = $record[0];
   

  if(isset($_POST['editar'])):
    $data -> setNombre_proveedor($_POST['nombre_proveedor']);
    $data -> setTelefono_proveedor($_POST['telefono_proveedor']);
    $data -> setCiudad_proveedor($_POST['ciudad_proveedor']);
    $data -> update();
    ?>
    <script> 
      alert('Datos Actualizados');
      document.location='proveedores.php';
    </script>
  <?php
  endif;
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
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="#"><i class="bi bi-pencil-fill"></i> Edicion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 pt-5 mt-5 text-center">

                  <div class="parte-media">
                    <h2 class="m-2">Proveedor a Editar</h2>
                    <div class="menuTabla contenedor2">
                      <form class="col d-flex flex-wrap" action=""  method="post">
                        <div class="mb-1 col-12">
                          <label for="nombre_proveedor" class="form-label">Nombre</label>
                          <input 
                            type="text"
                            id="nombre_proveedor"
                            name="nombre_proveedor"
                            class="form-control"  
                            value = "<?= $val['nombre_proveedor'];?>"
                          />
                        </div>

                        <div class="mb-1 col-12">
                          <label for="telefono_proveedor" class="form-label">Telefono</label>
                          <input 
                            type="text"
                            id="telefono_proveedor"
                            name="telefono_proveedor"
                            class="form-control"  
                            value = "<?= $val['telefono_proveedor'];?>"
                          
                          />
                        </div>

                        <div class="mb-1 col-12">
                          <label for="ciudad_proveedor" class="form-label">Ciudad</label>
                          <input 
                            type="text"
                            id="ciudad_proveedor"
                            name="ciudad_proveedor"
                            class="form-control"  
                            value = "<?= $val['ciudad_proveedor'];?>"
                            
                          />
                        </div>

                        <div class=" col-12 m-2">
                          <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                        </div>
                      </form>
                      <div id="charts1" class="charts"> </div>
                    </div>
                  </div>
                </div>
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