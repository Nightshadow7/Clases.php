<?php
// detecccion de errores en el codigo
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("../configuracion.php");

if(isset($_POST["guardar"])):
    $nano=$_POST['guardar'];

    if ($nano==="categorias"):
      $guardar = new Categorias();
      $guardar->setNombre_cat($_POST['nombre_cat']);
      $guardar->setDescripcion($_POST['descripcion']);
      $guardar->setImagen($_POST['imagen']);
      $guardar->insertData();
      print_r($guardar)
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../categorias.php';
      </script>
      <?php
    elseif ($nano === "clientes"):
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
    elseif ($nano === "empleados"):
      $guardar = new Empleados();
      $guardar->setNombre_emp($_POST['nombre_emp']);
      $guardar->setCelular_emp($_POST['celular_emp']);
      $guardar->setDireccion_emp($_POST['direccion_emp']);
      $guardar->setImagen_emp($_POST['imagen_emp']);
      $guardar->insertData();
      ?>
      <script>
        alert("Los datos fueron enviados correctamente");
        document.location='../empleados.php';
      </script>
      <?php
    elseif ($nano === "proveedores"):
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