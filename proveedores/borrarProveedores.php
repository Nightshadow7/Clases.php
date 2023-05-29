<?php


require_once("configuracionProveedores.php");

$record = new Proveedores();

if(isset($_GET['id_proveedor']) and isset($_GET['req'])):
  if (isset($_GET["req"]) == "delete"):
    $record-> setId_proveedor($_GET['id']);
    $record-> delete();
    ?>
    <script> 
    alert('Dato borrado satisfactoriamente');
    document.location='proveedores.php';
    </script>
  <?php 
  endif;
endif;
?>