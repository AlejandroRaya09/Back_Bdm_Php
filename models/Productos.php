<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Producto extends Conectar{

    public function agregarProducto($pNombreProducto,$pDescripcion,$pTipo,
    $pPrecio,$pCantidad,$pId_Usuario){

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionProductos('AgregarProducto',Null,?,?,?,?,?,?,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pNombreProducto);
        $sql ->bindValue(2,$pDescripcion);
        $sql ->bindValue(3,$pTipo);
        $sql ->bindValue(4,$pPrecio);
        $sql ->bindValue(5,$pCantidad);
        $sql ->bindValue(6,$pId_Usuario);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProductosVendedor($pId_Usuario){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarProductos('Vendedor',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Usuario);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProductosVendedorCategoria($pId_Producto){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarProductos('CategoriasVendedor',Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProductoIDVendedor($pId_Producto){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarProductos('IDVendedor',Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarProducto($pId_Producto,$pNombreProducto,$pDescripcion,$pPrecio){

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionProductos('EditarProducto',?,?,?,Null,?,Null,Null,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql ->bindValue(2,$pNombreProducto);
        $sql ->bindValue(3,$pDescripcion);
        $sql ->bindValue(4,$pPrecio);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProducto($pId_Producto){

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionProductos('EliminarProducto',?,Null,Null,Null,Null,Null,Null,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function agregarExistencias($pId_Producto,$pCantidad){

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionProductos('AgregarExistencias',?,Null,Null,Null,Null,?,Null,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql ->bindValue(2,$pCantidad);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProductoADMIN(){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarProductos('ProductosAdmin',Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function autorizarProd($pId_Producto,$pId_Usuario){

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionProductos('Autorizado',?,Null,Null,Null,Null,Null,?,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql ->bindValue(2,$pId_Usuario);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
}


public function NoautorizarProd($pId_Producto,$pId_Usuario){

    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "CALL sp_GestionProductos('No_Autorizado',?,Null,Null,Null,Null,Null,?,Null,Null,Null,Null,Null)";
    $sql = $conectar -> prepare ($sql);
    $sql ->bindValue(1,$pId_Producto);
    $sql ->bindValue(2,$pId_Usuario);
    $sql-> execute();
    return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
}

public function listarProductosFav(){
    $conectar = parent:: Conexion();
    parent::set_names();
    $sql = "CALL sp_listarProductos('Favoritos',Null,Null)";
    $sql = $conectar -> prepare ($sql);
    $sql -> execute();
    return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
}

public function listarProductosTODOS(){
    $conectar = parent:: Conexion();
    parent::set_names();
    $sql = "CALL sp_listarProductos('TODOS',Null,Null)";
    $sql = $conectar -> prepare ($sql);
    $sql -> execute();
    return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
}
}

?>