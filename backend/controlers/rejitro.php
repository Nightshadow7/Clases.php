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
    elseif ($nano === "c"):
      $guardar = new Clientes();
      $guardar->setNom_cliente($_POST['nom_cliente']);
      $guardar->setCelular_clien($_POST['celular_clien']);
      $guardar->setCompañia($_POST['compañia']);
      $guardar->insertData();
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../clientes.php';
      </script>
      <?php
    
    elseif ($nano === ""):
      $guardar = new Proveedores();
      $guardar->setNombre_proveedor($_POST['nombre_proveedor']);
      $guardar->setTelefono_proveedor($_POST['telefono_proveedor']);
      $guardar->setCiudad_proveedor($_POST['ciudad_proveedor']);
      $guardar->insertData();
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../proveedores.php';
      </script>
      <?php
    elseif ($nano === "productos"):
      $guardar = new Productos();
      $guardar->setNombre_del_producto($_POST['nombre_del_producto']);
      $guardar->setCategoria($_POST['categoria']);
      $guardar->setProveedor($_POST['proveedor']);
      $guardar->setStock($_POST['stock']);
      $guardar->setPrecio_unitario($_POST['precio_unitario']);
      $guardar->setUnidades_pedidas($_POST['unidades_pedidas']);
      $guardar->setDescontinuado($_POST['descontinuado']);
      print_r($guardar);
      $guardar->insertData();
      ?>
      <script>
        /**alert("Los datos fueron enviados correctamente");
        document.location='../productos.php'
      </script>
      <?php
    endif;
endif; 
?>