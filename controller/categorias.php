<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Categorias.php");

$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

case "listarCategorias":
    $datos = $categoria->listarCategotias();
    echo json_encode($datos);
    break;

case "agrearCategoria":
    $datos = $categoria->agregarCategoria($body['NombreCatego'],$body['DescripcionCatego'],$body['Id_Usuario']);
    echo json_encode($datos);
    break;

case "listarCategoriaID":
        $datos = $categoria -> listarCategoriaID($body['Id_Categoria']);
        echo json_encode($datos);
break;

case "editarCategoria":
    $datos = $categoria -> editarCategoria($body['NombreCatego'], $body['DescripcionCatego'], $body['Id_Categoria']);
    echo json_encode($datos);
break;

case "eliminarCategoria":
    $datos = $categoria -> eliminarCategoria($body['Id_Categoria']);
    echo json_encode($datos);
break;
}



?>