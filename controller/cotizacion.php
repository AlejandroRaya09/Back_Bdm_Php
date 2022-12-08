<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Cotizacion.php");

$cotizacion = new Cotizacion();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]){

    case "listarCotizacionVendedor":
        $datos = $cotizacion -> listarCotizacionVendedor($body['Id_Vendedor']);
        echo json_encode($datos);
    break;

    case "Ofertar":
        $datos = $cotizacion -> Ofertar($body['Id_Producto'],$body['Id_Vendedor'],$body['Id_Cliente'],$body['Precio']);
        echo json_encode($datos);
    break;


    case "listarCotizacionComprador":
        $datos = $cotizacion -> listarCotizacionComprador($body['Id_Cliente']);
        echo json_encode($datos);
    break;

    case "aceptarOferta":
        $datos = $cotizacion -> AceptarOferta($body['Id_Cotizacion']);
        echo json_encode($datos);
    break;


    case "negarOferta":
        $datos = $cotizacion -> NegarOferta($body['Id_Cotizacion']);
        echo json_encode($datos);
    break;
}