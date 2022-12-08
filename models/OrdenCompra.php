<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class OrdenCompra extends Conectar
{

    public function OrdenCompra($pCant_Prod,$pPrecioFinal,$pId_User,$pId_Domicilio,$pId_Pago)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "CALL sp_GestionOrdenCompra('Agregar',?,?,?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pCant_Prod);
        $sql->bindValue(2, $pPrecioFinal);
        $sql->bindValue(3, $pId_User);
        $sql->bindValue(4, $pId_Domicilio);
        $sql->bindValue(5, $pId_Pago);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}