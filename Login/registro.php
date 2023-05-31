<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once('../config/conectar.php');
require_once('../config/db.php');

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

  public function insertData(){
    try {
      $stm = $this->dbCnx -> prepare("INSERT INTO users (id_camper , email, username, password) values(?,?,?,?)");
      $stm -> execute(array($this->id_camper , $this->email,$this->username, md5($this->password)));
      // $stm = $this -> dbCnx -> prepare("INSERT INTO users(id,email,username,password) VALUES (:i,:ema,:users,:pas)");
      // $stm-> bindParam(':i',$this->id);
      // $stm-> bindParam(':ema',$this->email);
      // $stm-> bindParam(':users',$this->username);
      // $stm-> bindParam(':pas',$this->password);
      // $stm-> execute();
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
      return $e->getMessages();
    }
  }
  /*
  public function delete(){
    try {
      $stm = $this-> dbCnx -> prepare("DELETE FROM users WHERE id =?");
      $stm -> execute(array($this->id));
      return $stm -> fetchAll();
      ?>
      <script> 
      alert('Registro eliminado');
      document.location='.php'
      </script>";
      <?php 
    } catch (Exception $e) {
      return $e->getMessages();
    }
  } */
}
?>