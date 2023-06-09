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

class Empleados extends Conectar{
    // variables
    private $id_empleado;
    private $constructora;
    private $nombre;
    private $apellido;
    private $cargo;
    private $usuario;
    private $password;
    // constructor
    public function __construct($id_empleado = 0 , $constructora = "" , $nombre = "" ,$apellido = "", $cargo = "" , $usuario = "" , $password = "", $dbCnx = "" ){
        $this -> id_empleado=$id_empleado;
        $this -> constructora=$constructora;
        $this -> nombre=$nombre;
        $this -> apellido=$apellido;
        $this -> cargo=$cargo;
        $this -> usuario=$usuario;
        $this -> password=$password;
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
    public function getUsuario(){
        $this->usuario;
    }
    public function getPassword(){
        $this->password;
    }
    // setters
    public function setId_cliente($id_cliente){
        $this->id_cliente=$id_cliente;
    }
    public function setNom_cliente($nom_cliente){
        $this->nom_cliente=$nom_cliente;
    }
    public function setCelular_clien($celular_clien){
        $this->celular_clien=$celular_clien;
    }
    public function setCompañia($compañia){
        $this->compañia= $compañia;
    }
    // metodos
    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO clientes(nom_cliente,celular_clien,compañia) VALUES(:nomcli,:celcli,:comp)");
            $stm->bindParam(':nomcli', $this->nom_cliente);
            $stm->bindParam(':celcli', $this->celular_clien);
            $stm->bindParam(':comp', $this->compañia);
            $stm->execute();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function selectAll() {
        try {
            $stm=$this->dbCnx->prepare("SELECT * FROM clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        } 
    }
    public function delete(){
        try {
          $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE id_cliente = ?");
          $stm->execute(array($this->id));
          return $stm -> fetchAll();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 
    }
}

class Proveedores extends Conectar{
  // variables
  private $id_proveedor;
  private $nombre_proveedor;
  private $telefono_proveedor;
  private $ciudad_proveedor;
  // constructor
  public function __construct($id_proveedor = 0 , $nombre_proveedor = "" , $telefono_proveedor = "" , $ciudad_proveedor = "" , $dbCnx = ""){
      $this->id_proveedor = $id_proveedor;
      $this->nombre_proveedor= $nombre_proveedor;
      $this->telefono_proveedor= $telefono_proveedor;
      $this->ciudad_proveedor = $ciudad_proveedor;
      parent::__construct($dbCnx);
  }
    // getters
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

  // setters
  public function setId_proveedor($id_proveedor){
      $this->id_proveedor=$id_proveedor;
  }
  public function setNombre_proveedor($nombre_proveedor){
      $this->nombre_proveedor= $nombre_proveedor;
  }
  public function setTelefono_proveedor($telefono_proveedor){
      $this->telefono_proveedor=$telefono_proveedor;
  }
  public function setCiudad_proveedor($ciudad_proveedor) {
      $this->ciudad_proveedor = $ciudad_proveedor;
  }
  
  // metodos
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO proveedores(nombre_proveedor,telefono_proveedor,ciudad_proveedor) VALUES(:nompro,:telpro,:ciupro)");
          $stm->bindParam(":nompro",$this->nombre_proveedor);
          $stm->bindParam(":telpro",$this->telefono_proveedor);
          $stm->bindParam(":ciupro",$this->ciudad_proveedor);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM proveedores");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM proveedores WHERE id_proveedor=?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}

class Productos extends Conectar{
  #variables
  private $id_producto;
  private $nombre_del_producto;
  private $categoria;
  private $proveedor;
  private $stock;
  private $precio_unitario;
  private $unidades_pedidas;
  private $descontinuado;

  #constructor
  public function __construct($id_producto = 0 , $nombre_del_producto = "" , $categoria = 0 , $proveedor = 0 , $stock = 0 , $precio_unitario = 0 , $unidades_pedidas = 0 , $descontinuado = "" , $dbCnx = ""){
      $this->id_producto=$id_producto;
      $this->nombre_del_producto=$nombre_del_producto;
      $this->categoria=$categoria;
      $this->proveedor=$proveedor;
      $this->stock=$stock;
      $this->precio_unitario=$precio_unitario;
      $this->unidades_pedidas=$unidades_pedidas;
      $this->descontinuado=$descontinuado;
      parent::__construct($dbCnx);
  }

  #getter for variables
    public function getId_producto(){
        return $this->id_producto;
    }
    public function getNombre_del_producto() {
        return $this->nombre_del_producto;
    }
    public function getCategoria() {
        return $this->categoria;
    }
    public function getProveedor() {
        return $this->proveedor;
    }
    public function getStock() {
        return $this->stock;
    }
    public function getPrecio_unitario(){
        return $this->precio_Unitariot;
    }
    public function getUnidades_pedidas() {
        return $this->unitsPedidas;
    }
    public function getDescontinuado(){
        return $this->descontinuado;
    }
  #setter for variables
  public function setID($id_producto){
      $this->id_producto=$id_producto;
  }
  public function setNombre_del_producto($nombre_del_producto) {
      $this->nombre_del_producto=$nombre_del_producto;
  }
  public function setCategoria($categoria) {
      $this->categoria=$categoria;
  }
  public function setProveedor($proveedor) {
      $this->proveedor=$proveedor;
  }
  public function setStock($stock) {
      $this->stock=$stock;
  }
  public function setPrecio_unitario($precio_unitario){
      $this->precio_unitario=$precio_unitario;
  }
  public function setUnidades_pedidas($unidades_pedidas) {
      $this->unidades_pedidas=$unidades_pedidas;
  }
  public function setDescontinuado($descontinuado){
      $this->descontinuado=$descontinuado;
  }
  
  #metodos
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO productos(nombre_del_producto,categoria,proveedor,stock,precio_unitario,unidades_pedidas,descontinuado) VALUES(:nompro,:catpro,:provcat,:stopro,:prepro,unipro,despro)");
          $stm->bindParam(":nompro", $this->nombre_del_producto);
          $stm->bindParam(":catpro", $this->categoria);
          $stm->bindParam(":provcat", $this->proveedor);
          $stm->bindParam(":stopro", $this->stock);
          $stm->bindParam(":prepro", $this->precio_unitario);
          $stm->bindParam(":unipro", $this->unidades_pedidas);
          $stm->bindParam(":despro", $this->descontinuado);
          $stm->execute();
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM productos");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM productos WHERE id_producto = ?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
  /* nombre constructora y proveedores */
  public function nameCate($categoria){
      try {
          $stm = $this->dbCnx->prepare("SELECT idegoria,nombre FROM constructora ");
          $stm->execute(array($categoria));
          return $stm->fetchColumn();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 

  }
  public function nameProv($proveedor){
      try {
          $stm = $this->dbCnx->prepare("SELECT id_proveedor,nombre_proveedor FROM proveedores ");
          $stm->execute(array($proveedor));
          return $stm->fetchColumn();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 
  }
}

class Venta extends Conectar{
  /* variable */
  private$id_factura;
  private$fecha;
  private$empleado;
  private$cliente;
  private$id_fac;
  private$producto;
  private$cantidad;
  private$descuento;
  /* constructor */
  public function __construct($id_factura = 0 , $fecha = "" , $empleado = 0 , $cliente = 0 , $id_fac = 0 , $producto = 0 , $cantidad = 0 , $descuento = 0 , $dbCnx = "" ){
      $this->id_factura=$id_factura;
      $this->fecha=$fecha;
      $this->empleado=$empleado;
      $this->cliente=$cliente;
      $this->id_fac=$id_fac;
      $this->producto=$producto;
      $this->cantidad=$cantidad;
      $this->descuento=$descuento;
      parent::__construct($dbCnx);
  }
  /* getters */
  public function getId_factura(){
    return $this->id_factura;
  }
  public function getFecha(){
      return $this->fecha;
  }
  public function getEmpleado(){
      return $this->empleado;
  }
  public function getCliente(){
      return $this->cliente;
  }
    // getters factura detalles
    public function getId_fac(){
      return $this->id_fac;
    }
    public function getProducto(){
      return $this->producto;
    }
    public function getCantidad(){
      return $this->cantidad;
    }
    public function getDescuento(){
      return $this->descuento;
    }

  /* setters */
  public function setId_factura($id_factura){
   $this->id_factura=$id_factura;
  }
  public function setFecha($fecha){
   $this->fecha=$fecha;
  }
  public function setEmpleado($empleado){
   $this->empleado=$empleado;
  }
  public function setCliente($cliente){
   $this->cliente=$cliente;
  }
    // setters factura detalles 
    public function setId_fac($id_fac){
      $this->id_fac=$id_fac;
    }
    public function setProducto($producto){
      $this->producto=$producto;
    }
    public function setCantidad($cantidad){
      $this->cantidad=$cantidad;
    }
    public function setDescuento($descuento){
      $this->descuento=$descuento;
    }
  /* metodos */
  public function insertData(){
      try {
          $stm = $this->dbCnx->prepare("INSERT INTO facturas(fecha,id_empleado,id_cliente) VALUES(:fecfac,:empfac,:clifac)");
          $stm->bindParam(':fecfac',$this->fecha);
          $stm->bindParam(':empfac',$this->empleado);
          $stm->bindParam(':clifac',$this->cliente);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stm=$this->dbCnx->prepare("SELECT * FROM facturas");
          $stm->execute();
          return $stm->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function delete(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM facturas WHERE id_factura=?");
        $stm->execute(array($this->id));
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
  public function nameEmp($empleado){
    try {
        $stm = $this->dbCnx->prepare("SELECT id_empleado,nombre_emp FROM empleados");
        $stm->execute(array($empleado));
        return $stm->fetchColumn();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 

  }
  public function nameCli($cliente){
    try {
        $stm = $this->dbCnx->prepare("SELECT id_cliente,nom_cliente FROM clientes");
        $stm->execute(array($cliente));
        return $stm->fetchColumn();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
   /* metodos factura */
   public function getLastId(){
    $stm = $this->dbCnx->prepare("SELECT MAX(id_factura) FROM facturas");
    $stm->execute();
    return $stm->fetchColumn();
  }
  public function insertDatafac(){
    try {
        $stm = $this->dbCnx->prepare("INSERT INTO facturasDetalle(id_factura,id_producto,cantidad,descuento) VALUES(:facdet,:prodet,:candet,:desdet)");
        $stm->bindParam(':facdet',$this->id_fac);
        $stm->bindParam(':prodet',$this->producto);
        $stm->bindParam(':candet',$this->cantidad);
        $stm->bindParam(':desdet',$this->descuento);
        $stm->execute();
    } catch (Exception $e) {
        $e->getMessage();
    }
  }
  public function selectAllfac() {
    try {
        $stm = $this->dbCnx->prepare("SELECT * FROM facturasDetalle");
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        $e->getMessage();
    }
  }
  public function deletefac(){
    try {
      $stm = $this->dbCnx->prepare("DELETE FROM facturasDetalle WHERE id_detalle = ?");
      $stm->execute(array($this->id));
      return $stm -> fetchAll();
    } catch (Exception $e) {
        $e->getMessage();
    }
  }
}
