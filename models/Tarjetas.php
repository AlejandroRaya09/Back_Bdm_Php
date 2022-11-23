<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Tarjeta extends Conectar{

    public function agregarTarjeta($pNum_Tarjeta, $pNom_Tarjeta, 
    $pBanco, $pCaducidad, $pId_Usuario){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionTarjetas('Insert',Null,?,?,?,?,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNum_Tarjeta);
        $sql ->bindValue(2,$pNom_Tarjeta);
        $sql ->bindValue(3,$pBanco);
        $sql ->bindValue(4,$pCaducidad);
        $sql ->bindValue(5,$pId_Usuario);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function editarTarjeta($pId_Tarjeta, $pNum_Tarjeta, 
    $pNom_Tarjeta, $pBanco, $pCaducidad){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionTarjetas('Update',?,?,?,?,?,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Tarjeta);
        $sql ->bindValue(2,$pNum_Tarjeta);
        $sql ->bindValue(3,$pNom_Tarjeta);
        $sql ->bindValue(4,$pBanco);
        $sql ->bindValue(5,$pCaducidad);

        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminarTarjeta($pId_Tarjeta){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionTarjetas('Delete',?,NULL,NULL,NULL,NULL,NULL,NULL)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Tarjeta);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarTarjetas($pId_User){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarTarjetas('Todas', Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_User);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarTarjetaID($pId_Tarjeta){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarTarjetas('ID',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Tarjeta);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }



}



?>