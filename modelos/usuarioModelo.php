
<?php

require_once "mainModel.php";

class usuarioModelo extends mainModel
{
    /*--------- Crear Usuario ---------*/

    protected static function crear_usuario($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO usuarios(nombre,correo,contrasena) VALUES (:NOMBRE,:USERNAME,:CLAVE)");
        $sql->bindParam(":NOMBRE", $datos['nombre']);
        $sql->bindParam(":USERNAME", $datos['correo']);
        $sql->bindParam(":CLAVE", $datos['contrasena']);
        $sql->execute();
        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_usuario($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM usuarios WHERE id=:ID LIMIT 1");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT id FROM usuarios WHERE id!='1'");
        }

        $sql->execute();
        return $sql;
    }

    /*--------- Actualizar Usuario ---------*/

    protected static function actualizar_usuario($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE usuarios SET contrasena=:CLAVE  WHERE id=:ID");
        $sql->bindParam(":ID", $datos['id']);
        $sql->bindParam(":CLAVE", $datos['contrasena']);
        $sql->execute();
        return $sql;
    }
}
