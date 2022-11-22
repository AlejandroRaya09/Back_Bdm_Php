<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Listas.php");

$lista = new Lista();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]){


    case "agregarLista":
        $datos = $lista->agregarLista($body['NombreLista'],$body['DescripcionLista'],$body['Id_Usuario'],$body['tipoLista']);
        echo json_encode($datos);
    break;

    case "editarLista":
            $datos = $lista -> editarLista($body['NombreLista'], $body['DescripcionLista'], $body['Id_Usuario'], $body['tipoLista'],$body['Id_Lista']);
            echo json_encode($datos);
    break;

    case "eliminarLista":
            $datos = $lista -> eliminarLista($body['Id_Lista']);
            echo json_encode($datos);
    break;

    case "listarAllListas":
            $datos = $lista -> listarListas($body['Id_Usuario']);
            echo json_encode($datos);
    break;

    case "listarListaID":
        $datos = $lista -> listarListaID($body['Id_Lista']);
        echo json_encode($datos);
    break;
}



?>