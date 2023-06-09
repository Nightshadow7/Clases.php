<?php
// usado para encontrar errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("../controlers/konfij.php");

if (isset($_GET['id']) and isset($_GET['req'])) {
    if ($_GET['req']=="deleteconstructora"){
        $delete = new constructora();
        $delete ->setID($_GET['id']);
        $delete ->deleteSel();
        ?>
        <script>
          alert('¡Datos borrados satisfactoriamente!');
          document.location='../modelo/constructora.php';
        </script>
        <?php
    }elseif ($_GET['req']=="deleteproveedores") {
        $delete = new Proveedores();
        $delete ->setID($_GET['id']);
        $delete ->deleteSel();
        ?>
        <script>
          alert('¡Datos borrados satisfactoriamente!');
          document.location='../proveedores.php';
        </script>
        <?php
    }elseif ($_GET['req']=="deleteclientes") {
        $delete = new Clientes();
        $delete ->setID($_GET['id']);
        $delete ->deleteSel();
        ?>
        <script>
          alert('¡Datos borrados satisfactoriamente!');
          document.location='../clientes.php';
        </script>
        <?php
    }elseif($_GET['req']=="deleteempleados"){
        $delete = new Empleados();
        $delete->setID($_GET['id']);
        $delete->deleteSel();
        ?>
        <script>
          alert('¡Datos borrados satisfactoriamente!');
          document.location='../empleados.php';
        </script>
        <?php
    }elseif($_GET['req']=="deleteproductos"){
        $delete = new Productos();
        $delete ->setID($_GET['id']);
        $delete ->deleteSel();
        ?>
        <script>
          alert('¡Datos borrados satisfactoriamente!');
          document.location='../productos.php';
        </script>
        <?php
    }
}
?>
