<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 
require_once('../pdo.php');

class Proveedores extends ConexionPdo{
    private $id_proveedor;
    private $nombre_proveedor;
    private $telefono_proveedor;
    private $ciudad_proveedor;
    protected $dbCnx;

    public function __construct($id_proveedor = 0,$nombre_proveedor= "",$telefono_proveedor= 0, $ciudad_proveedor=""){
        $this->id_proveedor = $id_proveedor;
        $this->nombre_proveedor = $nombre_proveedor;
        $this->telefono_proveedor = $telefono_proveedor;
        $this->ciudad_proveedor_proveedor = $ciudad_proveedor;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    //Getters
    public function getId_proveedor(){
      return $this->id_proveedor;
    }
    public function getNombre_proveedor(){
      return $this->nombre_proveedor;
    }
    public function getTelefono_proveedor(){
      return $this->telefono_proveedor;
    }
    public function getCiudad_proveedor(){
      return $this->ciudad_proveedor;
    }

    //Setters
    public function setId_proveedor($id_proveedor){
      $this->id_proveedor = $id_proveedor;
    }
    public function setNombre_proveedor($nombre_proveedor){
      $this->nombre_proveedor = $nombre_proveedor;
    }
    public function setTelefono_proveedor($telefono_proveedor){
      $this->telefono_proveedor = $telefono_proveedor;
    }
    public function setCiudad_proveedor($ciudad_proveedor){
      $this->ciudad_proveedor = $ciudad_proveedor;
    }

    
    public function insertData(){
      try {
        $stm = $this-> dbCnx -> prepare("INSERT INTO proveedores(nombre_proveedor,telefono_proveedor,ciudad_proveedor) 
        VALUES (:nomb,:cel,:dire)");
        $stm->bindParam(":nomb",$this->nombre_proveedor);
        $stm->bindParam(":cel",$this->telefono_proveedor);
        $stm->bindParam(":dire",$this->ciudad_proveedor);
        $stm->execute();
      } catch (Exception $e) {
        return $e->getMessage();
      }

    }
    public function getAll(){
      try {
        $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores");
        $stm -> execute();
        return $stm -> fetchAll();
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }

    public function delete(){
      try {
        $stm = $this-> dbCnx -> prepare("DELETE FROM proveedores WHERE id_proveedor = :id");
        $stm->bindParam(":id",$this->proveedorId);
        $stm -> execute();
        return $stm -> fetchAll();
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }

    public function selectOne(){
      try {
        $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores WHERE id_proveedor = :id");
        $stm->bindParam(":id",$this->proveedorId);
        $stm -> execute();
        return $stm -> fetchAll();
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }

    public function update(){
      try {
            $stm = $this-> dbCnx -> prepare("UPDATE proveedores SET nombre_proveedor=:nomb , telefono_proveedor=:tel , ciudad_proveedor=:city
            WHERE id_proveedor = :id");
            $stm->bindParam(":id",$this->id_proveedor);
            $stm->bindParam(":nomb",$this->nombre_proveedor);
            $stm->bindParam(":tel",$this->telefono_proveedor);
            $stm->bindParam(":city",$this->ciudad_proveedor);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>