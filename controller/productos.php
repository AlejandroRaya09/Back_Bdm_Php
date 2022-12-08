<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Productos.php");

$producto = new Producto();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]){

    case "agregarProducto":
        $datos = $producto->agregarProducto($body['NombreProducto'],$body['Descripcion'],$body['Tipo'],
        $body['Precio'], $body['Cantidad'],$body['Id_Usuario']);
            echo json_encode($datos);
     break;

     case "listarProductosVendedor":
        $datos = $producto -> listarProductosVendedor($body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "listarProductosVendedorCategoria":
        $datos = $producto -> listarProductosVendedorCategoria($body['Id_Producto']);
        echo json_encode($datos);
    break;

    case "listarProductoIDVendedor":
        $datos = $producto -> listarProductoIDVendedor($body['Id_Producto']);
        echo json_encode($datos);
    break;

    case "editarProducto":
        $datos = $producto->editarProducto($body['Id_Producto'],$body['NombreProducto'],$body['Descripcion'],
        $body['Precio']);
            echo json_encode($datos);
     break;

     case "eliminarProducto":
        $datos = $producto -> eliminarProducto($body['Id_Producto']);
        echo json_encode($datos);
    break;

    case "agregarExistencias":
        $datos = $producto -> agregarExistencias($body['Id_Producto'],$body['Cantidad']);
        echo json_encode($datos);
    break;

    case "listarProductoADMIN":
        $datos = $producto -> listarProductoADMIN();
        echo json_encode($datos);
    break;

    case "autorizarProd":
        $datos = $producto -> autorizarProd($body['Id_Producto'],$body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "NoautorizarProd":
        $datos = $producto -> NoautorizarProd($body['Id_Producto'],$body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "listarProductosFav":
        $datos = $producto -> listarProductosFav();
        echo json_encode($datos);
    break;

    case "listarProductosTODOS":
        $datos = $producto -> listarProductosTODOS();
        echo json_encode($datos);
    break;

    case "listarBuscar":
        $datos = $producto -> listarBuscar($body['NombreProducto']);
        echo json_encode($datos);
    break;
}


?>