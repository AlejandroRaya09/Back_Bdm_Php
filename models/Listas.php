<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Lista extends Conectar{

    public function agregarLista($pNombre, $pDescripcion, $pUsuario, $pTipo){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('Insert',?,?,?,?,Null,Null,Null)";
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
        $sql = "CALL sp_GestionListas('Update',?,?,?,?,?,Null,Null)";
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
        $sql = "CALL sp_GestionListas('Delete',Null,Null,Null,NULL,?,Null,Null)";
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

    public function listarListaACTIVA($pId_User){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarListas('Activa',Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_User);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function hacerActiva($pUsuario,$pId_Lista){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('Activa',Null,Null,?,NULL,?,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pUsuario);
        $sql ->bindValue(2,$pId_Lista);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarDetalleLista($pId_Lista,$pId_Producto){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('ListaDetalleAgregar',Null,Null,Null,NULL,?,Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Lista);
        $sql ->bindValue(2,$pId_Producto);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function ListaDetalle($pId_Lista){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarListas('ListaDetalle',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Lista);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function EliminarDetalleLista($pId_Lista_Detalle){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionListas('EliminarDetalleLista',Null,Null,Null,NULL,Null,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Lista_Detalle);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
}



?>