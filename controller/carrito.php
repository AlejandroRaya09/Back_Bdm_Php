<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Carrito.php");

$carrito = new carrito();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "listarCarrito":
        $datos = $carrito->ListarCarrito($body['Id_Usuario']);
        echo json_encode($datos);
        break;

    case "agregarProductoCarrito":
        $datos = $carrito->AgregarCarritoDetalle($body['Id_Producto'], $body['Cantidad'], $body['Precio'], $body['PrecioTotal'], $body['Id_Carrito']);
        echo json_encode($datos);
        break;

    case "ListarCarritoCompleto":
        $datos = $carrito->ListarCarritoCompleto($body['Id_Carrito']);
        echo json_encode($datos);
        break;

    case "EliminarProducto":
        $datos = $carrito->EliminarProducto($body['Id_CarritoDetalle'], $body['Cantidad'], $body['PrecioTotal'], $body['Id_Usuario']);
        echo json_encode($datos);
        break;

    case "quitarExitenciaProducto":
        $datos = $carrito->quitarExitenciaProducto($body['Id_CarritoDetalle'], $body['Precio'], $body['Id_Usuario']);
        echo json_encode($datos);
        break;

    case "agregarExitenciaProducto":
        $datos = $carrito->agregarExitenciaProducto($body['Id_CarritoDetalle'], $body['Precio'], $body['Id_Usuario']);
        echo json_encode($datos);
        break;
}
