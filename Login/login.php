<?php 
require_once('../config/conectar.php');
require_once('../config/db.php');

class Loguearse extends Conectar{
  private $id_user;
  private $email;
  private $password;
  public function __construct($id_user = 0, $email = "", $password = "",$dbCnx = ""){
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    parent::__construct($dbCnx);
}    
  //setters
  public function setId_user($id_user){
      $this->id_user = $id_user;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function setPassword($password){
      $this->password = $password;
  }

  //getters
  public function getId_user(){
      return $this->id;
  }
  public function getEmail(){
      return $this->email;
  }
  public function getPassword(){
      return $this->password;
  }

  public function fetchAll(){
    try {
        $stm = $this->dbCnx->prepare("SELECT * FROM users");
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        return $e -> getMessage();
    }
}

  public function login(){
    try{
      $stat=$this->dbCnx->prepare("SELECT * FROM users WHERE email=? AND password=?",);
      $stat->execute(array($this->email,$this->password));
      $user = $stat->fetchAll();
      echo $user;
      if(count($user)>0){
          session_start();
          $_SESSION['id_user'] = $user[0]['id_user'];
          $_SESSION['email'] = $user[0]['email'];
          $_SESSION['password'] = $user[0]['password'];
          $_SESSION['username'] = $user[0]['username'];
          return true;
      }else{
          false;
      };
    }catch (Exception $e){
      return $e->getMessage();
    }
  }
}
?>