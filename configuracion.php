<?php
// usado para encontrar errores
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once('db.php');

class Categorias{
    private $id_categoria;
    private $nombre_cat;
    private $descripcion;
    private $imagen;
    protected $dbCnx;

    public function __construct($id_categoria = 0,$nombre_cat= "",$descripcion= "", $imagen=""){
        $this->id_categoria = $id_categoria;
        $this->nombre_cat = $nombre_cat;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    //Getters
    public function getId_categoria(){
      return $this->id_categoria;
    }
    public function getNombre_cat(){
      return $this->nombre_cat;
    }
    public function getDescripcion(){
      return $this->descripcion;
    }
    public function getImagen(){
      return $this->imagen;
    }

    //Setters
    public function setId_categoria($id_categoria){
      $this->id_categoria = $id_categoria;
    }
    public function setNombre_cat($nombre_cat){
      $this->nombre_cat = $nombre_cat;
    }
    public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
    }
    public function setImagen($imagen){
      $this->imagen = $imagen;
    }

    public function insertData(){
      try {
        $stm = $this-> dbCnx -> prepare("INSERT INTO categorias(nombre_cat,descripcion,imagen) 
        VALUES (:nomcat,:descr,:img)");
        $stm->bindParam(":nomcat",$this->nombre_cat);
        $stm->bindParam(":descr",$this->descripcion);
        $stm->bindParam(":img",$this->imagen);
        $stm->execute();
      } catch (Exception $e) {
        return $e->getMessage();
      }

    }

    public function selectAll(){
      try {
        $stat=$this->dbCnx->prepare("SELECT * FROM categorias");
        $stat->execute();
        return $stat->fetchAll();
      } catch (Exception $e) {
        $e->getMessage();
      } 
    }

    public function deleteSel(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE id_categoria = ?");
        $stm->execute([$this->id_categoria]);
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
    }
}
class Proveedores {
  // variables
  private $id;
  private $nombre;
  private $telefono;
  private $ciudad;
  protected $dbCnx;
  // constructor
  public function __construct($id=0, $nombre="", $telefono="", $ciudad=""){
      $this->id= $id;
      $this->nombre= $nombre;
      $this->telefono= $telefono;
      $this->ciudad= $ciudad;
      $this->dbCnx=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  // setters
  public function setID($id){
      $this->id=$id;
  }
  public function setNombre($nombre){
      $this->nombre= $nombre;
  }
  public function setTelefono($telefono){
      $this->telefono=$telefono;
  }
  public function setCiudad($ciudad) {
      $this->ciudad=$ciudad;
  }
  // getters
  public function getID(){
      return $this->id;
  }
  public function getNombre(){
      return $this->nombre;
  }
  public function getTelefono(){
      return $this->telefono;
  }
  public function getCiudad(){
      return $this->ciudad;
  }
  // metodos
  public function insertData(){
      try {
          $stat = $this->dbCnx->prepare("INSERT INTO proveedores(proveedor_nombre,proveedor_telefono,proveedor_ciudad) VALUES(?,?,?)");
          $stat -> execute([$this->nombre,$this->telefono,$this->ciudad]);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stat=$this->dbCnx->prepare("SELECT * FROM proveedores");
          $stat->execute();
          return $stat->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function deleteSel(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM proveedores WHERE proveedor_ID=?");
        $stm->execute([$this->id]);
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}
class Clientes{
  // variables
  private$id;
  private$telefono;
  private$company;
  protected $dbCnx;
  // constructor
  public function __construct($id=0,$telefono="",$company=""){
      $this->id=$id;
      $this->telefono=$telefono;
      $this->company=$company;
      $this->dbCnx=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  // setters
  public function setID($id){
      $this->id=$id;
  }
  public function setCompany($company){
      $this->company= $company;
  }
  public function setTelefono($telefono){
      $this->telefono=$telefono;
  }
  // getters
  public function getID(){
      $this->id;
  }
  public function getCompany(){
      $this->company;
  }
  public function getTelefono(){
      $this->telefono;
  }
  // metodos
  public function insertData(){
      try {
          $stat = $this->dbCnx->prepare("INSERT INTO clientes(cliente_celular,cliente_company) VALUES(?,?)");
          $stat -> execute([$this->telefono,$this->company]);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stat=$this->dbCnx->prepare("SELECT * FROM clientes");
          $stat->execute();
          return $stat->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function deleteSel(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE cliente_ID=?");
        $stm->execute([$this->id]);
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}
class Empleados{
  private $id;
  private $nombre;
  private $celular;
  private $direccion;
  private $imagen;
  protected $dbCnx;

  public function __construct($id =0, $nombre = "", $celular = "", $direccion ="",$imagen =""){
      $this->id=$id; 
      $this->nombre=$nombre; 
      $this->celular=$celular; 
      $this->direccion=$direccion; 
      $this->imagen=$imagen; 
      $this->dbCnx=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  #getters
  public function getId(){
      return $this->id;
  }
  public function getImagen(){
      return $this->imagen;
  }
  public function getNombre(){
      return $this->nombre;
  }
  public function getCelular(){
      return $this->celular;
  }
  public function getDireccion(){
      return $this->direccion;
  }
  #setters
  public function setId($id){
      $this->id=$id;
  }
 
  public function setNombre($nombre){
      $this->nombre=$nombre;
  }
  
  public function setCelular($celular){
      $this->celular=$celular;
  }
 
  public function setDireccion($direccion){
      $this->direccion=$direccion;
  }

  public function setImagen($imagen){
      $this->imagen=$imagen;
  }
  #metodos
  public function insertData(){
      try {
          $stat = $this->dbCnx->prepare("INSERT INTO empleados(empleado_nombre,empleado_celular,empleado_direccion,empleado_imagen) VALUES(?,?,?,?)");
          $stat -> execute([$this->nombre,$this->celular,$this->direccion,$this->imagen]);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stat=$this->dbCnx->prepare("SELECT * FROM empleados");
          $stat->execute();
          return $stat->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function deleteSel(){
      try {
        $stm = $this->dbCnx->prepare("DELETE FROM empleados WHERE empleado_ID=?");
        $stm->execute([$this->id]);
        return $stm -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }

}
class Productos{
  #variables
  private $id;
  private $nombre;
  private $categoria;
  private $proveedor;
  private $precioUnit;
  private $stock;
  private $unitsPedidas;
  private $descontinuado;
  protected $dbCnx;
  #constructor
  public function __construct($id=0, $nombre="", $categoria=0, $proveedor=0, $precioUnit=0, $stock=0, $unitsPedidas=0, $descontinuado=""){
      $this->id=$id;
      $this->nombre=$nombre;
      $this->categoria=$categoria;
      $this->proveedor=$proveedor;
      $this->precioUnit=$precioUnit;
      $this->stock=$stock;
      $this->unitsPedidas=$unitsPedidas;
      $this->descontinuado =$descontinuado;
      $this->dbCnx=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  #setter for variables
  public function setID($id){
      $this->id=$id;
  }
  public function setNombre($nombre) {
      $this->nombre=$nombre;
  }
  public function setCategoria($categoria) {
      $this->categoria=$categoria;
  }
  public function setProveedor($proveedor) {
      $this->proveedor=$proveedor;
  }
  public function setPreciounit($precioUnit){
      $this->precioUnit=$precioUnit;
  }
  public function setStock($stock) {
      $this->stock=$stock;
  }
  public function setUnitspedidas($unitsPedidas) {
      $this->unitsPedidas=$unitsPedidas;
  }
  public function setDescontinuado($descontinuado){
      $this->descontinuado=$descontinuado;
  }
  #getter for variables
  public function getID(){
       return $this->id;
  }
  public function getNombre() {
      return $this->nombre;
  }
  public function getCategoria() {
      return $this->categoria;
  }
  public function getProveedor() {
      return $this->proveedor;
  }
  public function getPreciounit(){
      return $this->precioUnit;
  }
  public function getStock() {
      return $this->stock;
  }
  public function getUnitspedidas() {
      return $this->unitsPedidas;
  }
  public function getDescontinuado(){
      return $this->descontinuado;
  }
  #metodos
  public function insertData(){
      try {
          $stat = $this->dbCnx->prepare("INSERT INTO productos(categoria_ID,proveedor_ID,precioUnit,stock,unidades_pedidas,nombre_producto,descontinuado) VALUES(?,?,?,?,?,?,?)");
          $stat -> execute([$this->categoria, $this->proveedor,$this->precioUnit,$this->stock,$this->unitsPedidas,$this->nombre,$this->descontinuado]);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stat=$this->dbCnx->prepare("SELECT * FROM productos");
          $stat->execute();
          return $stat->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function deleteSel(){
      try {
        $stat = $this->dbCnx->prepare("DELETE FROM productos WHERE producto_ID=?");
        $stat->execute([$this->id]);
        return $stat -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
  /* nombre categorias y proveedores */
  public function nameCate($categoria){
      try {
          $stat = $this->dbCnx->prepare("SELECT categorias.categoria_nombre FROM categorias INNER JOIN productos ON categorias.categoria_ID = productos.categoria_ID  WHERE categorias.categoria_ID = ?");
          $stat->execute([$categoria]);
          return $stat->fetchColumn();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 

  }
  public function nameProv($proveedor){
      try {
          $stat = $this->dbCnx->prepare("SELECT proveedores.proveedor_nombre FROM proveedores INNER JOIN productos ON proveedores.proveedor_ID = productos.proveedor_ID WHERE proveedores.proveedor_ID = ?");
          $stat->execute([$proveedor]);
          return $stat->fetchColumn();
            //   para saber como esta la pagina ahora
        } catch (Exception $e) {
            return $e -> getMessage();
        } 
  }
}
class Venta{
  /* variable */
  private$id;
  private$fecha;
  private$empleado;
  private$cliente;
  protected $dbCnx;
  /* constructor */
  public function __construct($id=0,$fecha="",$empleado="",$cliente=""){
      $this->id=$id;
      $this->fecha=$fecha;
      $this->empleado=$empleado;
      $this->cliente=$cliente;
      $this->dbCnx=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }
  /* setters */
  public function setID($id){
   $this->id=$id;
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
  /* getters */
  public function getID(){
      return $this->id;
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
  /* metodos */
  public function insertData(){
      try {
          $stat = $this->dbCnx->prepare("INSERT INTO facturas(empleado_ID,cliente_ID,fecha) VALUES(?,?,?)");
          $stat -> execute([$this->empleado,$this->cliente,$this->fecha]);
      } catch (Exception $e) {
          $e->getMessage();
      }
  }
  public function selectAll() {
      try {
          $stat=$this->dbCnx->prepare("SELECT * FROM facturas");
          $stat->execute();
          return $stat->fetchAll();
      } catch (Exception $e) {
          $e->getMessage();
      } 
  }
  public function deleteSel(){
      try {
        $stat = $this->dbCnx->prepare("DELETE FROM facturas WHERE factura_ID=?");
        $stat->execute([$this->id]);
        return $stat -> fetchAll();
          //   para saber como esta la pagina ahora
      } catch (Exception $e) {
          return $e -> getMessage();
      } 
  }
}
class VentaDetalle{
  private $id;
  private $factura;
  private $procvendido;
  
  private $cantidad;
  protected $dbCnx;
}
?>