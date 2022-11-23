<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

$usuario = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "validarLogin":
        $datos = $usuario->validarLogin($body['Username'],$body['Password']);
        if($datos == NULL){
            echo json_encode("Usuario no existe! Corregir Password o Username");
        }
        else {
            echo json_encode($datos);
        }
     break;

     case "registrarUsuario":
        $datos = $usuario->agregarUsuario($body['P_Nombre'],$body['S_Nombre'],$body['P_Apellido'],$body['S_Apellido'], $body['Genero'],
        $body['Correo'], $body['Username'],$body['Password'],$body['Roll'],$body['TipoPerfil']);
            echo json_encode($datos);
     break;


    case "listarUsuarioID":
        $datos = $usuario -> listarUsuarioID($body['Id_Usuario']);
        echo json_encode($datos);
    break;

    case "editarUsuario":
        $datos = $usuario->editarUsuario($body['P_Nombre'],$body['S_Nombre'],$body['P_Apellido'],$body['S_Apellido'], $body['Genero'],
        $body['Correo'], $body['Username'],$body['Password'],$body['TipoPerfil'],$body['Id_Usuario']);
            echo json_encode($datos);
     break;


}
?>