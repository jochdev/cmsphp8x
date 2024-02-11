
<?php

require_once "mainModel.php";

class publicacionModelo extends mainModel
{
    /*--------- Crear Usuario ---------*/

    protected static function crear_publicacion($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO publicaciones(titulo,contenido,autor,fecha_publicacion) VALUES (:TITULO,:RESUMEN,:AUTOR,:FECHA)");
        $sql->bindParam(":TITULO", $datos['titulo']);
        $sql->bindParam(":RESUMEN", $datos['resumen']);
        $sql->bindParam(":AUTOR", $datos['autor']);
        $sql->bindParam(":FECHA", $datos['fecha']);
        $sql->execute();
        return $sql;
    }

    /*--------- Listar publicaciones---------*/
    protected static function listar_publicacion()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM publicaciones as p ORDER BY p.id ASC");
        $sql->execute();

        //  resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }

    /*--------- Listar publicaciones de autor---------*/
    protected static function listar_publicacion_autor($autor)
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM publicaciones  WHERE autor LIKE '%$autor%'");
        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }

    /*--------- Datos ---------*/

    protected static function datos_publicacion($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM publicaciones WHERE id=:ID LIMIT 1");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT id FROM publicaciones WHERE id!='1'");
        }

        $sql->execute();
        return $sql;
    }

    /*--------- Actualizar ---------*/
    protected static function actualizar_publicacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE publicaciones SET titulo=:TITULO,contenido=:RESUMEN,fecha_publicacion=:FECHA  WHERE id=:ID");


        $sql->bindParam(":TITULO", $datos['titulo']);
        $sql->bindParam(":RESUMEN", $datos['resumen']);
        $sql->bindParam(":FECHA", $datos['fecha']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_publicacion($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM publicaciones WHERE id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Listar publicaciones de autor PDF---------*/
    protected static function listar_publicacion_autor_pdf($datos)
    {
        // var_dump($datos['tipo']);
        if ($datos['tipo'] === 1) {

            $sql = mainModel::conectar()->prepare("SELECT * 
            FROM publicaciones 
            WHERE autor LIKE '%" . $datos['autor'] . "%' 
            AND fecha_publicacion BETWEEN  '" . $datos['to'] . "' AND  '" . $datos['from'] . "'");
        } else {

            $sql = mainModel::conectar()->prepare("SELECT * 
        FROM publicaciones 
        WHERE autor LIKE '%" . $datos['autor'] . "%'  ");
        }





        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }
}
