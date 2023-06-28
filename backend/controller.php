<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

header('Content-Type:application/json');
  require_once ("conectar.php");
  require_once ("models.php");

  $alquilar = new Alquilar();
  $body = json_decode(file_get_contents("php://input"),true);

  switch ($_GET['op']) {
    case 'getAll':
      $datos = $alquilar -> getClientes();
      echo json_encode($datos,true);
      break;

    case 'insert':
      $data = $alquilar -> insertClientes($body['id_constructora'] , $body['nombre_constructora'] , $body['nit_constructora'] , $body['nombre_representante'] , $body['email_contacto'] , $body['telefono_contacto']);

      echo json_encode("los datos fueron cargados satisfactoriamente");
      break;
      
    case 'delete':
      $datos = $alquilar ->deleteCliente($_GET["id"]);
      echo json_encode("Cliente Eliminado", true);
      break;

    default:
      # code...
      break;
  }
?>