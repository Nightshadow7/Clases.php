<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

header('Content-Type:application/json');
  require_once ("./../conectar.php");
  require_once ("./../models.php");

  $pais = new Pais();
  $body = json_decode(file_get_contents("php://input"),true);

  switch ($_GET['op']) {
    case 'getAll':
      $datos = $pais -> getPais();
      echo json_encode($datos,true);
      break;

    case 'insert':
      $data = $pais -> insertPais($body['idPais'] , $body['nombrePais']);

      echo json_encode("los datos fueron cargados satisfactoriamente");
      break;
      
    case 'delete':
      $datos = $pais ->deletePais($_GET["id"]);
      echo json_encode("Pais Eliminado", true);
      break;

    case 'edit':
      break;
      
    default:
      # code...
      break;
  }
?>