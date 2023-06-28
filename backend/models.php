<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("conectar.php");

class Pais extends Conectar{
  public function getPais(){
    try {
      $conectar = parent::Conexion();
      parent::setName();
      $stm = $conectar -> prepare("SELECT * FROM pais");
      $stm -> execute();
      return $stm -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return $e;
    }
  }
  public function insertPais($idPais , $nombrePais){
    $conectar = parent::Conexion();
    parent::setName();
    $stm = "INSERT INTO pais (idPais , nombrePais) VALUE (:idp , :nomp)";
    $stm = $conectar -> prepare($stm);
    $stm -> bindParam('idp', $idPais);
    $stm -> bindParam('nomp',$nombrePais);
    $stm -> execute();

    return $stm -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function deletePais($id){
    $conectar = parent::Conexion();
    parent::setName();
    $sql = "DELETE FROM pais WHERE idPais = ?";
    $sql = $conectar -> prepare($sql);
    $sql -> bindValue(1,$id);
    $sql -> execute();
    return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function editPais($edi){
    $conectar = parent::Conexion();
    parent::setName();
    
  }
}

class Departamento extends Conectar{
  public function getDepartamento(){
    try {
      $conectar = parent::Conexion();
      parent::setName();
      $stm = $conectar -> prepare("SELECT * FROM departamento");
      $stm -> execute();
      return $stm -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return $e;
    }
  }
  public function insertDepartamento($idDep , $pais , $nombreDep){
    $conectar = parent::Conexion();
    parent::setName();
    $stm = "INSERT INTO departamento (idDep , pais , nombreDep) VALUE (:idd , :pai , :nomd)";
    $stm = $conectar -> prepare($stm);
    $stm -> bindParam('idd', $idDep);
    $stm -> bindParam('pai' , $pais);
    $stm -> bindParam('nomd', $nombreDep);
    $stm -> execute();

    return $stm -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function deleteDepartamento($id){
    $conectar = parent::Conexion();
    parent::setName();
    $sql = "DELETE FROM departamento WHERE idDep = ?";
    $sql = $conectar -> prepare($sql);
    $sql -> bindValue(1,$id);
    $sql -> execute();
    return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function editPais($edi){
    $conectar = parent::Conexion();
    parent::setName();
    
  }
}
?>