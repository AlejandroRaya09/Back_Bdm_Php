<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


class Usuario extends Conectar{

    public function validarLogin($pUsername, $pPassword){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_validarLogin(?,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pUsername);
        $sql ->bindValue(2,$pPassword);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarUsuario($pPNombre,$pSNombre,$pPApellido,$pSApellido,$pGenero,$pCorreo,$pUsername,$pPassword,$pRoll,$pPerfil){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionUsuario('Insert',?,?,?,?,?,?,?,?,?,?,NULL)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pPNombre);
        $sql ->bindValue(2,$pSNombre);
        $sql ->bindValue(3,$pPApellido);
        $sql ->bindValue(4,$pSApellido);
        $sql ->bindValue(5,$pGenero);
        $sql ->bindValue(6,$pCorreo);
        $sql ->bindValue(7,$pUsername);
        $sql ->bindValue(8,$pPassword);
        $sql ->bindValue(9,$pRoll);
        $sql ->bindValue(10,$pPerfil);
        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarUsuarioID($pId_Usuario){
        $conectar = parent:: Conexion();
        parent::set_names();
        $sql = "CALL sp_listarUsuario('ID',?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pId_Usuario);
        $sql -> execute();
        return $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function editarUsuario($pPNombre,$pSNombre,$pPApellido,$pSApellido,$pGenero,$pCorreo,$pUsername,$pPassword,$pPerfil,$pId_Usuario){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "CALL sp_GestionUsuario('Update',?,?,?,?,?,?,?,?,Null,?,?)";
        $sql = $conectar -> prepare ($sql);
        $sql ->bindValue(1,$pPNombre);
        $sql ->bindValue(2,$pSNombre);
        $sql ->bindValue(3,$pPApellido);
        $sql ->bindValue(4,$pSApellido);
        $sql ->bindValue(5,$pGenero);
        $sql ->bindValue(6,$pCorreo);
        $sql ->bindValue(7,$pUsername);
        $sql ->bindValue(8,$pPassword);
        $sql ->bindValue(9,$pPerfil);
        $sql ->bindValue(10,$pId_Usuario);

        $sql-> execute();
        return $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }
}
