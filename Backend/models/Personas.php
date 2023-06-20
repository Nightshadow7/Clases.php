<?php
require_once("../Config/Conectar.php");

class Personas extends Conectar{
    public function __construct(){
        parent::__construct();
    }

    public function get_Personas(){
        try {
            $sql = "SELECT * FROM Personas";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_Personas_id($id_persona){
        try {
            $sql = "SELECT * FROM Personas WHERE id_persona = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id_persona);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert_Personas($nombre,$edad,$telefono,$sexo,$direccion){
        try {
            $sql = "INSERT INTO Personas (nombre, edad , telefono, sexo, direccion) VALUES (:name, :age, :tel, :sex, :dir)"; 
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(":name",$nombre);
            $stm->bindParam(":age",$edad);
            $stm->bindParam(":tel",$telefono);
            $stm->bindParam(":sex",$sexo);
            $stm->bindParam(":dir",$direccion);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete_Persona($id_persona){
        try {
            $sql = "DELETE FROM campers WHERE id = :id";
            $stm = $this-> dbCnx -> prepare($sql);
            $stm->bindParam(':id', $id_persona);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>