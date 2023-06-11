<?php
// usado para encontrar errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once("../config/conectar.php");

class Constructora extends Conectar{
    private $id_constructora;
    private $nombre;
    private $direccion;
    private $telefono;

    public function __construct($id_constructora = 0,$nombre= "",$direccion= "", $telefono = 0 , $dbCnx = "" ){
        $this->id_constructora = $id_constructora;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        parent::__construct($dbCnx);
    }

    //Getters
    public function getId_constructora(){
      return $this->id_constructora;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function getDireccion(){
      return $this->direccion;
    }
    public function getTelefono(){
      return $this->telefono;
    }

    //Setters
    public function setId_constructora($id_constructora){
      $this->id_constructora = $id_constructora;
    }
    public function setNombre($nombre){
      $this->nombre = $nombre;
    }
    public function setDireccion($direccion){
      $this->direccion = $direccion;
    }
    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }

    public function insertData(){
      try {
        $stm = $this-> dbCnx -> prepare("INSERT INTO Constructora(nombre,direccion,telefono) 
        VALUES (:nom,:dir,:tel)");
        $stm->bindParam(":nom",$this->nombre);
        $stm->bindParam(":dir",$this->direccion);
        $stm->bindParam(":tel",$this->telefono);
        $stm->execute();
      } catch (Exception $e) {
        return $e->getMessage();
      }

    }

    public function selectAll(){
      try {
        $stm=$this->dbCnx->prepare("SELECT * FROM Constructora");
        $stm->execute();
        return $stm->fetchAll();
      } catch (Exception $e) {
        $e->getMessage();
      } 
    }

    public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM Constructora WHERE id_constructora = ?");
        $stm->execute(array($this->id_constructora));
        return $stm -> fetchAll();
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
    }
}

class Cargo extends Conectar{
    private $id_cargo;
    private $nombre;
  
    public function __construct($id_cargo = 0, $nombre = "" , $dbCnx = ""){
        $this->id_cargo=$id_cargo; 
        $this->nombre=$nombre;  
        parent::__construct($dbCnx);
    }
    #getters
    public function getId_cargo(){
        return $this->id_cargo;
    }
    public function getNombre(){
        return $this->nombre;
    }

    #setters
    public function setId_cargo($id_cargo){
        $this->id_cargo=$id_cargo;
    }
   
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    #metodos
    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO Cargo(nombre) VALUES(:nom)");
            $stm->bindParam(":nom",$this->nombre);
            $stm->execute();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function selectAll() {
        try {
            $stm=$this->dbCnx->prepare("SELECT * FROM Cargo");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        } 
    }
    public function delete(){
        try {
          $stm = $this->dbCnx->prepare("DELETE FROM Cargo WHERE id_cargo=?");
          $stm->execute(array($this->id_cargo));
          return $stm -> fetchAll();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 
    }
  
}

class Empleado extends Conectar{
    // variables
    private $id_empleado;
    private $constructora;
    private $nombre;
    private $apellido;
    private $cargo;
    // constructor
    public function __construct($id_empleado = 0 , $constructora = "" , $nombre = "" ,$apellido = "", $cargo = "" , $dbCnx = "" ){
        $this -> id_empleado=$id_empleado;
        $this -> constructora=$constructora;
        $this -> nombre=$nombre;
        $this -> apellido=$apellido;
        $this -> cargo=$cargo;
        parent::__construct($dbCnx);
    }
    // getters
    public function getId_empleado(){
        $this->id_empleado;
    }
    public function getConstructora(){
        $this->constructora;
    }
    public function getNombre(){
        $this->nombre;
    }
    public function getApellido(){
        $this->apellido;
    }
    public function getCargo(){
        $this->cargo;
    }
    // setters
    public function setId_empleado($id_empleado){
        $this->id_empleado=$id_empleado;
    }
    public function setConstructora($constructora){
        $this->constructora=$constructora;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido= $apellido;
    }
    public function setCargo($cargo){
        $this->cargo= $cargo;
    }
    // metodos
    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO Empleado(constructora , nombre , apellido , cargo) VALUES(:con,:nomb,:apel,:car)");
            $stm->bindParam(':con', $this -> constructora);
            $stm->bindParam(':nomb', $this -> nombre);
            $stm->bindParam(':apel', $this -> apellido);
            $stm->bindParam(':car', $this -> cargo);
            $stm->execute();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function selectAll() {
        try {
            $stm=$this->dbCnx->prepare("SELECT * FROM Empleado");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        } 
    }
    public function delete(){
        try {
          $stm = $this->dbCnx->prepare("DELETE FROM Empleado WHERE id_empleado = ?");
          $stm->execute(array($this->id));
          return $stm -> fetchAll();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 
    }
}

class Cliente extends Conectar{
  // variables
  private $id_cliente;
  private $nombre;
  private $apellido;
  private $telefono;
  // constructor
  public function __construct($id_cliente = 0 , $nombre = " " , $apellido = " " , $telefono = " " , $dbCnx = " "){
      $this->id_cliente = $id_cliente;
      $this->nombre= $nombre;
      $this->apellido= $apellido;
      $this->telefono = $telefono;
      parent::__construct($dbCnx);
  }
    // getters
    public function getId_cliente(){
        return $this->id_cliente;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTelefono(){
        return $this->telefono;
    }

  // setters
  public function setId_cliente($id_cliente){
      $this->id_cliente=$id_cliente;
  }
  public function setNombre($nombre){
      $this->nombre= $nombre;
  }
  public function setApellido($apellido){
      $this->apellido=$apellido;
  }
  public function setTelefono($telefono) {
      $this->telefono = $telefono;
  }
  
  // metodos
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO Cliente(nombre,apellido,telefono) VALUES(:nomr,:ape,:tell)");
          $stm->bindParam(":nomr",$this -> nombre);
          $stm->bindParam(":ape",$this -> apellido);
          $stm->bindParam(":tell",$this -> telefono);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM Cliente");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM Cliente WHERE id_cliente = ?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}

class Marca extends Conectar{
  #variables
  private $id_marca;
  private $nombre;

  #constructor
  public function __construct( $id_marca = 0 , $nombre = " " , $dbCnx = " " ){
      $this->id_marca=$id_marca;
      $this->nombre=$nombre;
      parent::__construct($dbCnx);
  }

  #getter for variables
  public function getId_marca(){
      return $this->id_marca;
  }
  public function getNombre() {
      return $this->nombre;
  }
  #setter for variables
  public function setId_marca($id_marca){
      $this->id_marca = $id_marca;
  }
  public function setNombre($nombre) {
      $this->nombre = $nombre;
  }
  
  #metodos
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO Marca(nombre) VALUES(:nomp)");
          $stm->bindParam(":nomp", $this->nombre);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM Marca");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM Marca WHERE id_marca = ?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}

class Categorias extends Conectar{
  #variables
  private $id_categoria;
  private $nombre;

  #constructor
  public function __construct( $id_categoria = 0 , $nombre = " " , $dbCnx = " " ){
      $this->id_categoria=$id_categoria;
      $this->nombre=$nombre;
      parent::__construct($dbCnx);
  }

  #getter for variables
  public function getId_categoria(){
      return $this->id_categoria;
  }
  public function getNombre() {
      return $this->nombre;
  }
  #setter for variables
  public function setId_categoria($id_categoria){
      $this->id_categoria = $id_categoria;
  }
  public function setNombre($nombre) {
      $this->nombre = $nombre;
  }
  
  #metodos
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO Categorias(nombre) VALUES(:nomc)");
          $stm->bindParam(":nomc", $this->nombre);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM Categorias");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM Categorias WHERE id_categoria = ?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}

class Productos extends Conectar{
  /* variable */
  private $id_producto;
  private $nombre;
  private $categoria;
  private $marca;
  private $precio;
  private $unidades;
  private $descontinuado;
  private $descripcion;
  /* constructor */
  public function __construct($id_producto = 0 , $nombre = " " , $categoria = 0 , $marca = 0 , $precio = 0 , $unidades = 0 , $descontinuado = " " , $descripcion = " " , $dbCnx = " " ){
      $this->id_producto=$id_producto;
      $this->nombre=$nombre;
      $this->categoria=$categoria;
      $this->marca=$marca;
      $this->precio=$precio;
      $this->unidades=$unidades;
      $this->descontinuado=$descontinuado;
      $this->descripcion=$descripcion;
      parent::__construct($dbCnx);
  }
  /* getters */
  public function getId_producto(){
    return $this->id_producto;
  }
  public function getNombre(){
      return $this->nombre;
  }
  public function getCategoria(){
      return $this->categoria;
  }
  public function getMarca(){
      return $this->marca;
  }
  public function getPrecio(){
    return $this->precio;
  }
  public function getUnidades(){
    return $this->unidades;
  }
  public function getDescontinuado(){
    return $this->descontinuado;
  }
  public function getDescripcion(){
    return $this->descripcion;
  }

  /* setters */
  public function setId_producto($id_producto){
   $this->id_producto=$id_producto;
  }
  public function setNombre($nombre){
   $this->nombre=$nombre;
  }
  public function setCategoria($categoria){
   $this->categoria=$categoria;
  }
  public function setMarca($marca){
   $this->marca=$marca;
  }
  public function setPrecio($precio){
    $this->precio=$precio;
  }
  public function setUnidades($unidades){
    $this->unidades=$unidades;
  }
  public function setDescontinuado($descontinuado){
    $this->descontinuado=$descontinuado;
  }
  public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
  }
  /* metodos */
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO Productos( nombre , categoria , marca , precio , unidades , descontinuado , descripcion) VALUES(:nomp,:catg,:marc,:pre,:uni,:desco,:descr)");
          $stm->bindParam(':nomp',$this -> nombre);
          $stm->bindParam(':catg',$this -> categoria);
          $stm->bindParam(':marc',$this -> marca);
          $stm->bindParam(':pre',$this -> precio);
          $stm->bindParam(':uni',$this -> unidades);
          $stm->bindParam(':desco',$this -> descontinuado);
          $stm->bindParam(':descr',$this -> descripcion);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM Productos");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM Productos WHERE id_producto=?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}
