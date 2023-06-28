<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

header('Content-Type:application/json');
  require_once ("./../conectar.php");
  require_once ("./../models.php");

  $departamento = new Departamento();
  $body = json_decode(file_get_contents("php://input"),true);

  switch ($_GET['op']) {
    case 'getAll':
      $datos = $departamento -> getDepartamento();
      echo json_encode($datos,true);
      break;

    case 'insert':
      $datos = $departamento -> insertDepartamento($body['idDep'] , $body['pais'] , $body['nombreDep']);

      echo json_encode("los datos fueron cargados satisfactoriamente");
      break;
      
    case 'delete':
      $datos = $departamento ->deleteDepartamento($_GET["id"]);
      echo json_encode("Departamento Eliminado", true);
      break;

    case 'edit':
      break;
      
    default:
      # code...
      break;
  }
?>