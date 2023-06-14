<?php
// detecccion de errores en el codigo
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("konfij.php");

if(isset($_POST["guardar"])):
    $nano=$_POST['guardar'];

    if ($nano === "constructora"):
      $guardar = new constructora();
      $guardar->setNombre($_POST['nombre']);
      $guardar->setDireccion($_POST['direccion']);
      $guardar->setTelefono($_POST['telefono']);
      $guardar->insertData();
      print_r($guardar)
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/constructora.php';
      </script>
      <?php

    elseif ($nano === "cargos"):
      $guardar = new Cargo();
      $guardar->setNombre($_POST['nombre']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/cargos.php';
      </script>
      <?php
    elseif ($nano === "empleado"):
      $guardar = new Empleado();
      $guardar->setConstructora($_POST['constructora']);
      $guardar->setNombre($_POST['nombre']);
      $guardar->setApellido($_POST['apellido']);
      $guardar->setCargo($_POST['cargo']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/empleados.php';
      </script>
      <?php

    elseif ($nano === "cliente"):
      $guardar = new Cliente();
      $guardar->setNombre($_POST['nombre']);
      $guardar->setApellido($_POST['apellido']);
      $guardar->setTelefono($_POST['telefono']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/cliente.php';
      </script>
      <?php
    elseif ($nano === "marca"):
      $guardar = new Marca();
      $guardar->setNombre($_POST['nombre']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/marca.php'
      </script>
      <?php
    elseif ($nano === "categorias"):
      $guardar = new Categorias();
      $guardar->setNombre($_POST['nombre']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/categorias.php'
      </script>
      <?php
    elseif ($nano === "productos"):
      $guardar = new Productos();
      $guardar->setNombre($_POST['nombre']);
      $guardar->setCategoria($_POST['categoria']);
      $guardar->setMarca($_POST['marca']);
      $guardar->setPrecio($_POST['precio']);
      $guardar->setUnidades($_POST['unidades']);
      $guardar->setDescontinuado($_POST['descontinuado']);
      $guardar->setDescripcion($_POST['descripcion']);
      $guardar->insertData();
      print_r($guardar);
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../modelo/productos.php'
      </script>
      <?php
    elseif ($nano === "cotizacion"):
      $guardar = new Cotizacion();
      $guardar->setEmpleado($_POST['empleado']);
      $guardar->setCliente($_POST['cliente']);
      $guardar->setFecha($_POST['fecha']);
      $guardar->insertData();
      print_r($guardar);
      $factura = $save->getLastId();
      $guardar->setFactura($factura);
      $guardar->setProducto($_POST['producto']);
      $guardar->setCantidad($_POST['cantidad']);
      $guardar->insertDatafac();
      print_r($guardar);
      ?>
      <script>
        // alert("Los datos fueron enviados correctamente");
        // document.location='../modelo/cotizacion.php'
      </script>
      <?php
    endif;
endif;
?>