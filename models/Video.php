<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Video extends Conectar{

    public function AgregarVideo_ID($pId_Producto){
        $conectar = parent:: Conexion();
        parent::set_names();

        $sql = "CALL sp_GestionVideos('Insert_ID',Null,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function AgregarVideo($pVideo){
        $conectar = parent:: Conexion();
        parent::set_names();

        $sql = "CALL sp_GestionVideos('Insert_Video',Null,Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pVideo);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }



}




?>