<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Cotizacion extends Conectar{


    public function listarCotizacionVendedor($pId_Vendedor){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_ListarCotizaciones('ListarCotizacionesVendedor',Null,Null,?,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Vendedor);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function Ofertar($pId_Producto,$pId_Vendedor,$pId_Cliente,$pPrecio){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCotizacion('Ofertar',Null,?,?,?,?,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Producto);
        $sql ->bindValue(2,$pId_Vendedor);
        $sql ->bindValue(3,$pId_Cliente);
        $sql ->bindValue(4,$pPrecio);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function listarCotizacionComprador($pId_Cliente){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_ListarCotizaciones('ListarCotizacionesComprador',Null,Null,Null,?,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Cliente);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function AceptarOferta($pId_Cotizacion){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCotizacion('Aceptar',?,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Cotizacion);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function NegarOferta($pId_Cotizacion){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionCotizacion('Negar',?,Null,Null,Null,Null,Null)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Cotizacion);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
}