<?php

class vistasModelo
{

    /*--------- Modelo obtener vistas ---------*/
    protected static function obtener_vistas_modelo($vistas)
    {


        $listaBlanca = ["account", "crear-publicacion", "editar-publicacion", "publicaciones", "publicaciones-autor", "generar-pdf", "mi-perfil"];


        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./vistas/paginas/" . $vistas . "-view.php")) {
                $_SESSION['page_active'] =  $vistas;
                $contenido = "./vistas/paginas/" . $vistas . "-view.php";
            } else {
                $contenido = "404";
            }
        } elseif ($vistas == "login" || $vistas == "index") {
            $contenido = "login";
        } elseif ($vistas == "registro") {
            $contenido = "registro";
        } elseif ($vistas == "confirm-registro") {
            $contenido = "confirm-registro";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
