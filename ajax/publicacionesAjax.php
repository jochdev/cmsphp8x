<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['titulo_reg']) || isset($_POST['publicacion_id']) || isset($_POST['publicacion_id_del'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/publicacionControlador.php";
    $instancia_controlador = new publicacionControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['titulo_reg'])) {
        echo $instancia_controlador->crear_publicacion_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['publicacion_id'])) {
        echo $instancia_controlador->actualizar_publicacion_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['publicacion_id_del'])) {
        echo $instancia_controlador->eliminar_publicacion_controlador();
    }
} else {
    // cerrar sesión
}
