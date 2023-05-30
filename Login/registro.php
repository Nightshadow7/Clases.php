<?php 
require_once('../config/conectar.php');

class Registro extends Conectar{

  private $id_user;
  private $id;
  private $email;
  private $username;
  private $password;

  public function __construct($id_user = 0, $id = 0, $email = "", $username = "", $password = "", $dbCnx=""){
    $this->id_user = $id_user;
    $this->id = $id;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    parent:: __construct($dbCnx);
  }
  //getters
  public function setId_user(){
    return $this->id_user;
  }
  public function setId(){
    return $this->id;
  }
  public function setEmail(){
    return $this->email;
  }
  public function setUsername(){
    return $this->username;
  }
  public function setPassword(){
    return $this->password;
  }

  //setters
  public function getId_user($id_user){
    $this->id_user = $id_user;
  }
  public function getId($id){
    $this->id = $id;
  }
  public function getEmail($email){
    $this->email = $email;
  }
  public function getUsername($username){
    $this->username = $username;
  }
  public function getPassword($password){
    $this->password = $password;
  }

  public function insertData(){
    try {
      $stm = $this -> dbCnx -> prepare("INSERT INTO users(id,email,username,password) VALUES (:i,:ema,:users,:pas)");
      $stm-> bindParam(':i',$this->id);
      $stm-> bindParam(':ema',$this->email);
      $stm-> bindParam(':users',$this->username);
      $stm-> bindParam(':pas',$this->password);
      $stm-> execute();
    } catch (Exception $e) {
      return $e->getMessage();
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