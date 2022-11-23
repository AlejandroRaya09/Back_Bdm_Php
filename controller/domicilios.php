<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Domicilios.php");

$domicilio = new Domicilio();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {


    case "agregarDomicilio":
        $datos = $domicilio->agregarDomicilio($body['Calle'],$body['Numero'],$body['Colonia'],
        $body['CP'],$body['Municipio'],$body['Estado'],$body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "editarDomicilio":
            $datos = $domicilio -> editarDomicilio($body['Id_Domicilio'],$body['Calle'],$body['Numero'],$body['Colonia'],$body['CP'],$body['Municipio'],$body['Estado']);
            echo json_encode($datos);
    break;

    case "eliminarDomicilio":
            $datos = $domicilio -> eliminarDomicilio($body['Id_Domicilio']);
            echo json_encode($datos);
    break;

    case "listarDomicilios":
        $datos = $domicilio -> listarDomicilios($body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "listarDomicilioID":
    $datos = $domicilio -> listarDomiciliosID ($body['Id_Domicilio']);
    echo json_encode($datos);
    break;



}
?>