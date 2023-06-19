<?php
require_once("../Models/Camper.php");
/* header("Content-Type: application/json"); */
$psicologas = new Psicologas();

/* $body = json_decode(file_get_contents("php://input"), true);
 */
    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $psicologas->get_psicologas();
            echo json_encode($datos);
        break;

        case 'GetId':
            $datos = $psicologas->get_psicologas_id($body["id"]);
            echo json_encode($datos);
        break;

        case "insert":
            $datos=$psicologas->insert_Psicologas($_POST["nombre_psicologas"],$_POST["edad_psicologas"],$_POST["especialidad"],$_POST["cargo"]);
            echo json_encode("Psicologa insertado correctamente");
        break;

        case "update":
            $datos=$psicologas->update_psicologas($body["id"], $body["imagen"],$body["nombre"],$body["edad"] ,$body["promedio"] ,$body["nivelCAmpus"], $body["nivelIngles"] , $body["especialidad"] , $body["direccion"] , $body["celular"] , $body["ingles"] , $body["Ser"] , $body["Review"] , $body["Skills"] , $body["Asitencia"]);
            echo json_encode("psicologas actualizado correctamente");
        break;
        
        case "delete":
            $datos=$psicologas->delete_psicologas($body["id"]);
            echo json_encode("Psicologa eliminado correctamente");
        break;
    }
?>