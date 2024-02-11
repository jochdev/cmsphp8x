<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['nombre_reg']) || isset($_POST['pass_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/usuarioControlador.php";
    $instancia_controlador = new usuarioControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_reg'])) {
        echo $instancia_controlador->crear_usuario_controlador();
    }

    /*--------- Actualizar Contraseña ---------*/
    if (isset($_POST['pass_up'])) {
        echo $instancia_controlador->actualizar_usuario_controlador();
    }
} else {
    // cerrar sesión
}
