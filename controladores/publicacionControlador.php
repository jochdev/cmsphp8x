<?php

if ($peticionAjax) {
    require_once "../modelos/publicacionModelo.php";
} else {
    require_once "./modelos/publicacionModelo.php";
}

class publicacionControlador extends publicacionModelo
{
    /*--------- Crear usuario ---------*/
    public function crear_publicacion_controlador()
    {
        $titulo_reg = mainModel::limpiar_cadena($_POST['titulo_reg']);
        $resumen_reg = mainModel::limpiar_cadena($_POST['resumen_reg']);
        $autor_reg = mainModel::limpiar_cadena($_POST['autor_reg']);
        $fecha_reg = mainModel::limpiar_cadena($_POST['fecha_reg']);




        $data = [
            "titulo" => $titulo_reg,
            "resumen" => $resumen_reg,
            "autor" => $autor_reg,
            "fecha" => $fecha_reg

        ];



        $publicacion = publicacionModelo::crear_publicacion($data);

        if ($publicacion->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Publicación registrada",
                "Texto" => "Los datos de la publicación han sido registrados con exito.",
                "Tipo" => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido registrar la publicación, intentalo nuevamente.",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }
    /*--------- Listar publicaciones ---------*/
    public function listar_publicacion_controlador()
    {
        $datos = publicacionModelo::listar_publicacion();
        return $datos;
    }

    /*--------- Listar publicaciones autor---------*/
    public function listar_publicacion_autor_controlador($autor)
    {

        $datos = publicacionModelo::listar_publicacion_autor($autor);
        return $datos;
    }


    /*--------- Datos  ---------*/
    public function datos_publicacion_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return publicacionModelo::datos_publicacion($tipo, $id);
    }

    /*--------- Datos PDF ---------*/
    public function datos_publicacion_pdf_controlador($at)
    {
        $datos = publicacionModelo::listar_publicacion_autor_pdf($at);
        return $datos;
    }

    /*--------- Controlador actualizar  ---------*/
    public function actualizar_publicacion_controlador()
    {
        $id = mainModel::decryption($_POST['publicacion_id']);
        $id = mainModel::limpiar_cadena($id);
        $titulo_reg = mainModel::limpiar_cadena($_POST['titulo_up']);
        $resumen_reg = mainModel::limpiar_cadena($_POST['resumen_up']);
        $fecha_reg = mainModel::limpiar_cadena($_POST['fecha_up']);

        $data = [
            "id" => $id,
            "titulo" => $titulo_reg,
            "resumen" => $resumen_reg,
            "fecha" => $fecha_reg

        ];

        if (publicacionModelo::actualizar_publicacion($data)) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Datos actualizados",
                "Texto" => "Los datos han sido actualizados con exito",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido actualizar los datos, por favor intente nuevamente",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }


    /*--------- Controlador eliminar módulo ---------*/
    public function eliminar_publicacion_controlador()
    {
        /** Recibiendo ID de la vista */
        $id = mainModel::decryption($_POST['publicacion_id_del']);
        $id = mainModel::limpiar_cadena($id);

        /** Comprobar si tiene los permisos */



        /** Eliminar */

        $eliminar_registro = publicacionModelo::eliminar_publicacion($id);

        if ($eliminar_registro->rowCount() == 1) {
            $alerta = [
                "Alerta" => "redireccionar",
                "Titulo" => "Publicación eliminado",
                "Texto" => "La publicación ha sido eliminada del sistema exitosamente",
                "Tipo" => "success",
                "URL" => SERVERURL . "publicaciones"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido eliminar la publicación, por favor intente nuevamente",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }
}
