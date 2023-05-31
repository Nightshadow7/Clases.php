<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

session_start();

if(isset($_POST["loguearse"])):
    require_once("login.php");
    
    $credenciales= new Loguearse();
    $credenciales->setEmail($_POST['email']);
    $credenciales->setPassword($_POST['password']);
    $login= $credenciales->login();
    if($login){
        header('location: ../Home/home.php');
    }else{
      ?>
        <script>
        alert('password o email invalidos');
        document.location='loginRegister.php';
        </script>
        <?php 
    };
endif;
?>