<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if(isset($_POST["registrar"])){
    require_once("registro.php");

    $registrar = new Registro();

    $registrar->setId_camper($_POST["id_camper"]);
    $registrar->setEmail($_POST["email"]);
    $registrar->setUsername($_POST["username"]);
    $registrar->setPassword($_POST["password"]);



    $registrar->insertData();

    print_r($registrar);
    ?>


    <script> 
    // alert('Los datos fueron guardados exitosamente');
    // document.location='loginRegister.php';
    </script>
    <?php 
}
?>