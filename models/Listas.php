<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Lista extends Conectar{

    public function agregarLista($pNombre, $pDescripcion, $pUsuario, $pTipo){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('Insert',?,?,?,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNombre);
        $sql ->bindValue(2,$pDescripcion);
        $sql ->bindValue(3,$pUsuario);
        $sql ->bindValue(4,$pTipo);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function editarLista($pNombre, $pDescripcion,$pUsuario, $pTipo, $pId_Lista){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('Update',?,?,?,?,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNombre);
        $sql ->bindValue(2,$pDescripcion);
        $sql ->bindValue(3,$pUsuario);
        $sql ->bindValue(4,$pTipo);
        $sql ->bindValue(5,$pId_Lista);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminarLista($pId_Lista){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('Delete',Null,Null,Null,NULL,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Lista);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function listarListas($pId_User){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarListas('Todas', Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_User);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarListaID($pId_Lista){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarListas('ID',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Lista);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

}



?>