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

    if($registrar-> checkUser($_POST['email'])){
        ?>
        <script>
            alert('El usuario ya existe por favor logueate');
            document.location='loginRegister.php';
        </script>
        <?php 
        }else{
            $registrar->insertData();
            ?>
            <script> 
                alert('Los datos fueron guardados exitosamente');
                document.location='../Home/home.php';
            </script>
            <?php 
        }
    
}
?>