<?php
require_once("../Models/Personas.php");
/* header("Content-Type: application/json"); */
$personas = new Personas();

/* $body = json_decode(file_get_contents("php://input"), true);
 */
    switch ($_GET["op"]) {
        case 'GetAll':
            $datos = $personas->get_Personas();
            echo json_encode($datos);
        break;

        case 'GetId':
            $datos = $personas->get_Personas_id($_POST["id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$personas->insert_Personas($_POST["nombre"],$_POST["edad"],$_POST["telefono"],$_POST["sexo"],$_POST["direccion"]);
        break;

        case "Update":
            $datos=$personas->update_Personas($body["id"], $body["imagen"],$body["nombre"],$body["edad"] ,$body["promedio"] ,$body["nivelCAmpus"], $body["nivelIngles"] , $body["especialidad"] , $body["direccion"] , $body["celular"] , $body["ingles"] , $body["Ser"] , $body["Review"] , $body["Skills"] , $body["Asitencia"]);
            echo json_encode("Personas actualizado correctamente");
        break;
        
        case "Delete":
            $datos=$personas->delete_Persona($_POST["id"]);
            echo json_encode("Psicologa eliminado correctamente");
        break;
    }
?>