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

  public function insertClientes($id_constructora , $nombre_constructora , $nit_constructora , $nombre_representante , $email_contacto , $telefono_contacto){
    $conectar = parent::Conexion();
    parent::setName();
    $stm = "INSERT INTO constructoras (id_constructora,nombre_constructora , nit_constructora , nombre_representante , email_contacto , telefono_contacto) VALUES (:idc , :nombc , :nit , :nombr , :eml , :tel)";
    $stm = $conectar -> prepare($stm);
    $stm-> bindParam('idc', $id_constructora);
    $stm-> bindParam('nombc', $nombre_constructora);
    $stm-> bindParam('nit', $nit_constructora);
    $stm-> bindParam('nombr', $nombre_representante);
    $stm-> bindParam('eml', $email_contacto);
    $stm-> bindParam('tel', $telefono_contacto);
    $stm-> execute();

    return $stm -> fetchAll(PDO::FETCH_ASSOC);
  }

  public function deleteCliente($id){
    $conectar = parent::Conexion();
    parent::setName();
    $sql = "DELETE FROM constructoras WHERE id_constructora = ?";
    $sql = $conectar -> prepare($sql);
    $sql -> bindValue(1,$id);
    $sql -> execute();
    return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
  }
}
?>