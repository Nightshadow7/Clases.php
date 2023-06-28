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

class Region extends Conectar{
  public function getRegion(){
    try {
      $conectar = parent::Conexion();
      parent::setName();
      $stm = $conectar -> prepare("SELECT * FROM region");
      $stm -> execute();
      return $stm -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return $e;
    }
  }
  public function insertRegion($idReg , $departamento , $nombreReg){
    $conectar = parent::Conexion();
    parent::setName();
    $stm = "INSERT INTO region (idReg , departamento , nombreReg) VALUE (:idr , :dep , :nomr)";
    $stm = $conectar -> prepare($stm);
    $stm -> bindParam('idr', $idReg);
    $stm -> bindParam('dep' , $departamento);
    $stm -> bindParam('nomr', $nombreReg);
    $stm -> execute();

    return $stm -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function deleteRegion($id){
    $conectar = parent::Conexion();
    parent::setName();
    $sql = "DELETE FROM region WHERE idReg = ?";
    $sql = $conectar -> prepare($sql);
    $sql -> bindValue(1,$id);
    $sql -> execute();
    return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function editRegion($edi){
    $conectar = parent::Conexion();
    parent::setName();
    
  }
}

class Camper extends Conectar{
  public function getCamper(){
    try {
      $conectar = parent::Conexion();
      parent::setName();
      $stm = $conectar -> prepare("SELECT * FROM campers");
      $stm -> execute();
      return $stm -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      return $e;
    }
  }
  public function insertCamper($idCamper , $region , $nombre , $apellido , $fechaNac){
    $conectar = parent::Conexion();
    parent::setName();
    $stm = "INSERT INTO campers (idCamper , region , nombre , apellido , fechaNac) VALUE (:idc , :reg , :nomc , :apel , :fecn)";
    $stm = $conectar -> prepare($stm);
    $stm -> bindParam('idc', $idCamper);
    $stm -> bindParam('reg' , $region);
    $stm -> bindParam('nomc', $nombre);
    $stm -> bindParam('apel', $apellido);
    $stm -> bindParam('fecn', $fechaNac);
    $stm -> execute();

    return $stm -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function deleteCamper($id){
    $conectar = parent::Conexion();
    parent::setName();
    $sql = "DELETE FROM campers WHERE idCamper = ?";
    $sql = $conectar -> prepare($sql);
    $sql -> bindValue(1,$id);
    $sql -> execute();
    return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
  }
  public function editCamper($edi){
    $conectar = parent::Conexion();
    parent::setName();
    
  }
}

?>