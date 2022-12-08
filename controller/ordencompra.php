<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/OrdenCompra.php");

$ordencompra = new ordencompra();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "OrdenCompra":
        $datos = $ordencompra->OrdenCompra($body['Cant_Prod'], $body['PrecioFinal'],$body['Id_Us_Cliente'],$body['Id_Domicilio'],$body['Id_Pago']);
        echo json_encode($datos);
        break;

}