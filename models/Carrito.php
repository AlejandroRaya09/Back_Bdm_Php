<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Carrito extends Conectar{

    public function ListarCarrito($pId_User){
        $conectar = parent:: Conexion();
        parent::set_names();

        $sql = "CALL sp_ListarCarrito('ID',?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_User);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function AgregarCarritoDetalle($pId_Producto, $pCantidad, $pPrecio,
                                          $pPrecioTotal_Detalle, $pId_Carrito){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCarrito('InsertarProducto',?,Null,Null,Null,?,?,?,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(2,$pId_Producto);
        $sql ->bindValue(3,$pCantidad);
        $sql ->bindValue(4,$pPrecio);
        $sql ->bindValue(5,$pPrecioTotal_Detalle);
        $sql ->bindValue(1,$pId_Carrito);

        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function ListarCarritoCompleto($pId_Carrito){
        $conectar = parent:: Conexion();
        parent::set_names();

        $sql = "CALL sp_ListarCarrito('ListarCarrito',Null,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Carrito);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

}




?>