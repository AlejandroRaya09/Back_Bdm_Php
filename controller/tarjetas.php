<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Tarjetas.php");

$tarjeta = new Tarjeta();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {


    case "agregarTarjeta":
        $datos = $tarjeta->agregarTarjeta($body['Num_Tarjeta'],$body['Nom_Tarjeta'],$body['Banco'],
        $body['Caducidad'],$body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "editarTarjeta":
            $datos = $tarjeta -> editarTarjeta($body['Id_Tarjeta'],$body['Num_Tarjeta'],$body['Nom_Tarjeta'],$body['Banco'],
            $body['Caducidad']);
            echo json_encode($datos);
    break;

    
    case "eliminarTarjeta":
            $datos = $tarjeta -> eliminarTarjeta($body['Id_Tarjeta']);
            echo json_encode($datos);
    break;

    case "listarTarjetas":
        $datos = $tarjeta -> listarTarjetas($body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "listarTarjetaID":
    $datos = $tarjeta -> listarTarjetaID ($body['Id_Tarjeta']);
    echo json_encode($datos);
    break;



}
?>