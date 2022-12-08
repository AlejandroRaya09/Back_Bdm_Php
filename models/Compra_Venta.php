<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class CompraVenta extends Conectar
{

    public function CompraVenta($pId_Producto,$pCantidad,$pPrecio,$pPrecioTotal,$pId_Orden,$pId_Vendedor,$pId_Cliente)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_Compra_VentaRegistros('Insertar',Null,?,?,?,?,?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pId_Producto);
        $sql->bindValue(2, $pCantidad);
        $sql->bindValue(3, $pPrecio);
        $sql->bindValue(4, $pPrecioTotal);
        $sql->bindValue(5, $pId_Orden);
        $sql->bindValue(6, $pId_Vendedor);
        $sql->bindValue(7, $pId_Cliente);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listarVentas ($pId_Usuario){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_listarCompraVenta('Listado Ventas',?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pId_Usuario);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarCompras ($pId_Usuario){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_listarCompraVenta('Listado Compras',?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pId_Usuario);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}