<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL); 

require_once("../config/conectar.php");

class Estudiante extends Conectar{
    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    private $review;
    private $ser;
    private $ingles;
    private $skills;
    private $asistencia;
    private $especialidad;
    

    public function __construct($id = 0,$nombres= "",$direccion= "", $logros="", $review="", $ser=0, $ingles="", $skills=0, $asistencia = "", $especialidad = "", $dbCnx = ""){
        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->review = $review;
        $this->ser = $ser;
        $this->ingles = $ingles;
        $this->skills = $skills;
        $this->asistencia = $asistencia;
        $this->especialidad = $especialidad;
        parent:: __construct($dbCnx);
    }

    //Getters
    public function getId(){
      return $this->id;
    }
    public function getNombres(){
      return $this->nombres;
    }
    public function getDireccion(){
      return $this->direccion;
    }
    public function getLogros(){
      return $this->logros;
    }
    public function getReview(){
      return $this->review;
    }
    public function getSer(){
      return $this->ser;
    }
    public function getIngles(){
      return $this->ingles;
    }
    public function getSkills(){
      return $this->skills;
    }
    public function getAsistencia(){
      return $this->asistencia;
    }
    public function getEspecialidad(){
      return $this->especialidad;
    }

    //Setters
    public function setId($id){
      $this->id = $id;
    }
    public function setNombres($nombres){
      $this->nombres = $nombres;
    }
    public function setDireccion($direccion){
      $this->direccion = $direccion;
    }
    public function setLogros($logros){
      $this->logros = $logros;
    }
    public function setReview($review){
      $this->review = $review;
    }
    public function setSer($ser){
      $this->ser = $ser;
    }
    public function setIngles($ingles){
      $this->ingles = $ingles;
    }
    public function setSkills($skills){
      $this->skills = $skills;
    }
    public function setAsistencia($asistencia){
      $this->asistencia = $asistencia;
    }
    public function setEspecialidad($especialidad){
      $this->especialidad = $especialidad;
    }

    
    public function insertData(){
        try {
          $stm = $this-> dbCnx -> prepare("INSERT INTO camper (nombres,direccion,logros,review,ser,ingles,skills,asistencia,especialidad) values(?,?,?,?,?,?,?,?,?)");
            /* $stm = $this-> dbCnx -> prepare("INSERT INTO camper (nombres,direccion,logros,review,ser,ingles,skills,asistencia,especialidad) values(:nom,:direc,:logr,:revi,:ser,:ing,:ski,:asis,:espec)"); */
            /* $stm -> bindParam(':nom', $this->nombres);
            $stm -> bindParam(':direc', $this->direccion);
            $stm -> bindParam(':logr', $this->logros);
            $stm -> bindParam(':revi', $this->review);
            $stm -> bindParam(':ser', $this->ser);
            $stm -> bindParam(':ing', $this->ingles);
            $stm -> bindParam(':ski', $this->skills);
            $stm -> bindParam(':asis', $this->asistencia);
            $stm -> bindParam(':espec', $this->especialidad); */
            $stm -> execute(array($this->nombres, $this->direccion, $this->logros, $this->review, $this->ser, $this->ingles, $this->skills, $this->asistencia, $this->especialidad));
        } catch (Exception $e) {
          return $e->getMessages();
        }

    }
    public function obtainAll(){
      try {
        $stm = $this-> dbCnx -> prepare("SELECT * FROM camper");
        $stm -> execute();
        return $stm -> fetchAll();  
      } catch (Exception $e) {
        return $e->getMessages();
      }
    }
    public function delete(){
      try {
        $stm = $this-> dbCnx -> prepare("DELETE FROM camper WHERE id =?");
        $stm -> execute(array($this->id));
        return $stm -> fetchAll();
        echo " <script> alert('Registro eliminado');
              document.location='estudiantes.php'
              </script>";
      } catch (Exception $e) {
        return $e->getMessages();
      }
    }
    public function selectOne(){
      try {
        $stm = $this-> dbCnx -> prepare("SELECT * FROM camper WHERE id =?");
        $stm -> execute(array($this->id));
        return $stm -> fetchAll();
      } catch (Exception $e) {
        return $e->getMessages();
      }
    }
    public function update(){
      try {
        $stm = $this-> dbCnx -> prepare("UPDATE camper SET nombres=?, direccion=?, logros=? WHERE id =?");
        $stm -> execute(array($this->nombres, $this->direccion, $this->logros, $this->id ));
      } catch (Exception $e) {
        return $e->getMessages();
      }
    }
}
?>