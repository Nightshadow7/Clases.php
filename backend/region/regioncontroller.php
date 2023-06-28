<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

header('Content-Type:application/json');
  require_once ("./../conectar.php");
  require_once ("./../models.php");

  $region = new Region();
  $body = json_decode(file_get_contents("php://input"),true);

  switch ($_GET['op']) {
    case 'getAll':
      $datos = $region -> getRegion();
      echo json_encode($datos,true);
      break;

    case 'insert':
      $data = $region -> insertRegion($body['idReg'] , $body['departamento'] , $body['nombreReg']);

      echo json_encode("los datos fueron cargados satisfactoriamente");
      break;
      
    case 'delete':
      $datos = $region ->deleteRegion($_GET["id"]);
      echo json_encode("Region Eliminada", true);
      break;

    case 'edit':
      break;
      
    default:
      # code...
      break;
  }
?>