<?php
if(isset($_POST["registrar"])){
    require_once("registro.php");

    $registrar = new Registro();

    $registrar->setId($_POST["id"]);
    $registrar->setEmail($_POST["email"]);
    $registrar->setUsername($_POST["username"]);
    $registrar->setPassword($_POST["password"]);



    $registrar->insertData();
    ?>
    <script> 
    alert('Los datos fueron guardados exitosamente');
    document.location='loginRegister.php';
    </script>
    <?php 
}
?>