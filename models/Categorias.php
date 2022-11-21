<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Categoria extends Conectar{

    public function listarCategotias(){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_listarCategoriasActivas()";
        $sql = $conectar -> prepare ($sql);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarCategoria($pNombre, $pDescripcion, $pUsuario){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCategoria('Insert',?,?,?, Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNombre);
        $sql ->bindValue(2,$pDescripcion);
        $sql ->bindValue(3,$pUsuario);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarCategoriaID($pId_Categoria){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarCategoriaID(?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Categoria);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarCategoria($pNombre, $pDescripcion, $pId_Categoria){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCategoria('Update',?,?,Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNombre);
        $sql ->bindValue(2,$pDescripcion);
        $sql ->bindValue(3,$pId_Categoria);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarCategoria($pId_Categoria){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCategoria('Delete',Null,Null,Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Categoria);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

}
