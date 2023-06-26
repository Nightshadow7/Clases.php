<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once ("conectar.php");

class Alquilar extends Conectar{

  public function getClientes(){
    try {
      $conectar = parent::Conexion();
      parent::setName();
      $stm = $conectar -> prepare("SELECT * FROM constructoras");
      $stm -> execute();
      return $stm -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return $e -> getMessage();
    }
  }

  public function insertClientes($nombre_constructora , $nit_constructora , $nombre_representante , $email_contacto , $telefono_contacto){
    $conectar = parent::Conectar();
    parent::setName();
    $stm = "INSERT INTO constructoras (nombre_constructora , nit_constructora , nombre_representante , email_contacto , telefono_contacto) VALUES (:nombc , :nit , :nombr , :eml , :tel)";
    $stm = $conectar -> prepare($stm);
    $stm -> bindParam('nombc', $nombre_constructora);
    $stm -> bindParam('nit', $nit_constructora);
    $stm -> bindParam('nombr', $email_contacto);
    $stm -> bindParam('tel', $telefono_contacto);
    $stm->execute();
  }
}
?>