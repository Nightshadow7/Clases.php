<?php
require_once("db.php");

class Config{
    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    protected $dbCnx;

    public function __construct($id = 0,$nombres= "",$direccion= "", $logros=""){
        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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
    
    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO camper (nombres,direccion,logros) values(?,?,?)");
            $stm -> execute(array($this->nombres, $this->direccion, $this->logros));
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
}
?>