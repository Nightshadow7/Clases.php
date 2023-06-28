<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

header('Content-Type:application/json');
  require_once ("./../conectar.php");
  require_once ("./../models.php");

  $camper = new Camper();
  $body = json_decode(file_get_contents("php://input"),true);

  switch ($_GET['op']) {
    case 'getAll':
      $datos = $camper -> getCamper();
      echo json_encode($datos,true);
      break;

    case 'insert':
      $datos = $camper -> insertCamper($body['idCamper'] , $body['region'] , $body['nombre'] , $body['apellido'] , $body['fechaNac']);

      echo json_encode("los datos fueron cargados satisfactoriamente");
      break;
      
    case 'delete':
      $datos = $camper ->deleteCamper($_GET["id"]);
      echo json_encode("Camper Eliminado", true);
      break;

    case 'edit':
      break;
      
    default:
      # code...
      break;
  }
?>