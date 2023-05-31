<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once('../config/conectar.php');
require_once('../config/db.php');
require_once('loguearse.php');

class Registro extends Conectar{

  private $id_user;
  private $id_camper ;
  private $email;
  private $username;
  private $password;

  public function __construct($id_user = 0, $id_camper  = 0, $email = "", $username = "", $password = "", $dbCnx=""){
    $this->id_user = $id_user;
    $this->id_camper  = $id_camper ;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    parent:: __construct($dbCnx);
  }
  //getters
  public function setId_user($id_user){
    $this->id_user = $id_user;
    
  }
  public function setId_camper ($id_camper){
    $this->id_camper = $id_camper ;
  }
  public function setEmail($email){
    $this->email = $email;
    
  }
  public function setUsername($username){
    $this->username = $username;
    
  }
  public function setPassword($password){
    $this->password = $password;
    
  }

  //setters
  public function getId_user(){
    return $this->id_user;
  }
  public function getId_camper(){
    return $this->id_camper ;
    
  }
  public function getEmail(){
    return $this->email;
  }
  public function getUsername(){
    return $this->username;
  }
  public function getPassword(){
    return $this->password;
  }

  public function checkUser($email){
    try {
      $stm= $this-> dbCnx->prepare("SELECT * FROM  users WHERE email = '$email'");
      $stm->execute();
      if($stm -> fetchColumn()){
        return true;
      } else{
        return false;
      }

    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function insertData(){
    try {
      
      $stm = $this -> dbCnx -> prepare("INSERT INTO users(id_camper,email,username,password) VALUES (:i,:ema,:users,:pas)");
      $stm-> bindParam(':i',$this->id_camper);
      $stm-> bindParam(':ema',$this->email);
      $stm-> bindParam(':users',$this->username);
      $stm-> bindParam(':pas',$this->password);
      $stm-> execute();

      $loguearse = new Loguearse();
      $loguearse -> setEmail($_POST['email']);
      $loguarse -> setPassword($_POST['password']);
      $success = $login -> login();
      
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
  public function obtainAll(){
    try {
      $stm = $this-> dbCnx -> prepare("SELECT id,nombres FROM camper");
      $stm -> execute();
      return $stm -> fetchAll();  
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
  /* public function delete(){
    try {
    $stm = $this->dbCnx->prepare("DELETE FROM camper WHERE id=?" );
        $stm->execute([$this->id]) ;
        return $stm -> fetchAll();
        echo"<script>alert('borrado exitosamente');document.location='estudiantes.php'</script>";
    } catch (Exception $e) {
        return $e -> getMessage(); 
    }
  } */

  /* public function selectOne(){
    try {
        $stm = $this->dbCnx->prepare("SELECT * FROM camper WHERE id=?");
        $stm->execute([$this->id]);
    return $stm -> fetchAll();
    } catch (Exception $e) {
        return $e -> getMessage();
    }
  }
  
  public function update(){
    try {
    $stm = $this->dbCnx->prepare("UPDATE campers SET nombres=?,direcion=?,logros=? WHERE id=?");
    $stm->execute([$this->nombres, $this->direcion, $this->logros, $this->id]);
    } catch (Exception $e) {
        return $e -> getMessage(); 
    }
  } */
}

?>