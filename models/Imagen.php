<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Imagen extends Conectar{

    public function AgregarImagen($pImagen){
        $conectar = parent:: Conexion();
        parent::set_names();

        $sql = "CALL sp_GestionImagenes('Insert',5,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pImagen);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }




}




?>