<?php
 
if(isset($_POST["guardar"])):
    require_once(__DIR__ . '.php');

    $config = new Proveedores();

    $config->setNombre_proveedor($_POST["nombre_proveedor"]);
    $config->setTelefono_proveedor($_POST["telefono_proveedor"]);
    $config->setCiudad_proveedor($_POST["ciudad_proveedor"]);

    $config->insertData(); 
    ?>

    <script> 
    alert('Los datos fueron guardados exitosamente');
    document.location='proveedores.php';
    </script>

<?php 
endif; 
?>