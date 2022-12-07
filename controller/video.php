<?php
header('Content-type: application/json');

require_once("../config/conexion.php");
require_once("../models/Video.php");

$video = new Video();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "agregarVideo":
        if(isset($_FILES['VideoPropia'])){

        $video_tipo = $_FILES['VideoPropia']['type'];
		$video_nombre = $_FILES['VideoPropia']['name'];
        $video_size = $_FILES['VideoPropia']['size'];
        $temporal = $_FILES['VideoPropia']['tmp_name'];

        $videoSubida= fopen($temporal, 'r');
        $binariosvideo = fread($videoSubida,$video_size);

       $datos = $video->AgregarVideo($binariosvideo);
        echo json_encode($datos);
        }
        break;

    case "agregarVideo_ID":
            $datos = $video -> AgregarVideo_ID($body['Id_Producto']);
            echo json_encode($datos);
    break;

}