<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Carrito extends Conectar
{

    public function ListarCarrito($pId_User)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_ListarCarrito('ID',?,Null)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pId_User);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AgregarCarritoDetalle(
        $pId_Producto,
        $pCantidad,
        $pPrecio,
        $pPrecioTotal_Detalle,
        $pId_Carrito
    ) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCarrito('InsertarProducto',?,Null,Null,Null,?,?,?,?,Null)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(2, $pId_Producto);
        $sql->bindValue(3, $pCantidad);
        $sql->bindValue(4, $pPrecio);
        $sql->bindValue(5, $pPrecioTotal_Detalle);
        $sql->bindValue(1, $pId_Carrito);

        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function ListarCarritoCompleto($pId_Carrito)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_ListarCarrito('ListarCarrito',Null,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pId_Carrito);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }



    public function EliminarProducto(
        $pId_CarritoDetalle,
        $pCantidad,
        $pPrecioTotal_Detalle,
        $pId_User
    ) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCarrito('EliminarProducto',Null,Null,Null,?,Null,?,Null,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(4, $pId_User);
        $sql->bindValue(2, $pCantidad);
        $sql->bindValue(3, $pPrecioTotal_Detalle);
        $sql->bindValue(1, $pId_CarritoDetalle);

        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }



    public function quitarExitenciaProducto(
        $pId_CarritoDetalle,
        $pPrecio,
        $pId_User
    ) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCarrito('quitarUnidades',Null,Null,Null,?,Null,Null,?,Null,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(3, $pId_User);
        $sql->bindValue(2, $pPrecio);
        $sql->bindValue(1, $pId_CarritoDetalle);

        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarExitenciaProducto(
        $pId_CarritoDetalle,
        $pPrecio,
        $pId_User
    ) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCarrito('agregarUnidades',Null,Null,Null,?,Null,Null,?,Null,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(3, $pId_User);
        $sql->bindValue(2, $pPrecio);
        $sql->bindValue(1, $pId_CarritoDetalle);

        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>