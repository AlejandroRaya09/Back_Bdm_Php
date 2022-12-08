<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Compra_Venta.php");

$compraventa = new compraventa();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "CompraVenta":
        $datos = $compraventa->CompraVenta($body['Id_Producto'], $body['Cantidad'],$body['Precio'],$body['PrecioTotal'],$body['Id_Orden'],$body['Id_Vendedor'],$body['Id_Cliente']);
        echo json_encode($datos);
        break;

        case "listarVentas":
            $datos = $compraventa->listarVentas($body['Id_Usuario']);
            echo json_encode($datos);
            break;

            case "listarCompras":
                $datos = $compraventa->listarCompras($body['Id_Usuario']);
                echo json_encode($datos);
                break;
}