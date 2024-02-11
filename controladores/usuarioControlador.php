<?php

if ($peticionAjax) {
    require_once "../modelos/usuarioModelo.php";
} else {
    require_once "./modelos/usuarioModelo.php";
}

class usuarioControlador extends usuarioModelo
{
    /*--------- Crear usuario ---------*/
    public function crear_usuario_controlador()
    {
        $nombre = mainModel::limpiar_cadena($_POST['nombre_reg']);
        $email = mainModel::limpiar_cadena($_POST['email_reg']);
        $pass = mainModel::limpiar_cadena($_POST['pass_red']);

        $data = [
            "nombre" => $nombre,
            "correo"  => $email,
            "contrasena"  =>  mainModel::encryption($pass),
        ];

        // var_dump($data);

        $usuario = usuarioModelo::crear_usuario($data);
        // var_dump($usuario);
        if ($usuario->rowCount() == 1) {
            $alerta = [
                "Alerta" => "redireccionar",
                "Titulo" => "Usuario registrado",
                "Texto" => "Los datos del usuario han sido registrados con exito.",
                "Tipo" => "success",
                "URL" => SERVERURL . "confirm-registro"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido registrar al usuario, intentalo nuevamente.",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }


    /*--------- Controlador datos  ---------*/
    public function datos_usuario_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return usuarioModelo::datos_usuario($tipo, $id);
    }




    /*--------- Crear usuario ---------*/
    public function actualizar_usuario_controlador()
    {
        $user_id = mainModel::limpiar_cadena($_POST['user_id']);
        $pass_up = mainModel::limpiar_cadena($_POST['pass_up']);

        $data = [
            "id" => $user_id,
            "contrasena"  =>  mainModel::encryption($pass_up),
        ];



        if (usuarioModelo::actualizar_usuario($data)) {
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
}
