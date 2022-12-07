<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Imagen.php");

$imagen = new Imagen();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "agregarImagen":
        if(isset($_FILES['imagenPropia'])){

        $imagen_tipo = $_FILES['imagenPropia']['type'];
		$imagen_nombre = $_FILES['imagenPropia']['name'];
        $imagen_size = $_FILES['imagenPropia']['size'];
        $temporal = $_FILES['imagenPropia']['tmp_name'];

        $imagenSubida= fopen($temporal, 'r');
        $binariosImagen = fread($imagenSubida,$imagen_size);

       $datos = $imagen->AgregarImagen($binariosImagen);
        echo json_encode($datos);
        }
        break;

    case "agregarImagen_ID":
            $datos = $imagen -> AgregarImagen_ID($body['Id_Producto']);
            echo json_encode($datos);
    break;

}