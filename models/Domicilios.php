<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Domicilio extends Conectar{

    public function agregarDomicilio($pCalle, $pNumero, $pColonia, $pCP, 
    $pMunicipio, $pEstado, $pId_Usuario){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionDomicilio('Insert',Null,?,?,?,?,?,?,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pCalle);
        $sql ->bindValue(2,$pNumero);
        $sql ->bindValue(3,$pColonia);
        $sql ->bindValue(4,$pCP);
        $sql ->bindValue(5,$pMunicipio);
        $sql ->bindValue(6,$pEstado);
        $sql ->bindValue(7,$pId_Usuario);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function editarDomicilio($pId_Domicilio,$pCalle, $pNumero, $pColonia, $pCP, $pMunicipio,$pEstado){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionDomicilio('Update',?,?,?,?,?,?,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Domicilio);
        $sql ->bindValue(2,$pCalle);
        $sql ->bindValue(3,$pNumero);
        $sql ->bindValue(4,$pColonia);
        $sql ->bindValue(5,$pCP);
        $sql ->bindValue(6,$pMunicipio);
        $sql ->bindValue(7,$pEstado);

        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminarDomicilio($pId_Domicilio){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionDomicilio('Delete'?,Null,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Domicilio);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarDomicilios($pId_User){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarDomicilios('Todas', Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_User);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarDomiciliosID($pId_Domicilio){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarDomicilios('ID',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Domicilio);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


}


?>