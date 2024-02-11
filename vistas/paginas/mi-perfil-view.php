<?php
require_once "./controladores/usuarioControlador.php";
$mainModel = new mainModel();
$instancia_controlador = new usuarioControlador();

$usuario =  $instancia_controlador->datos_usuario_controlador("Unico", mainModel::encryption($_SESSION['id_posup']));
if ($usuario->rowCount() == 1) {
    $campos = $usuario->fetch();
}
?>
<div id="wrapperuno">
    <div class="container py-4">
        <h2>Mi perfil</h2>
        <p>Ingresa la información más reciente</p>

        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/registro.php" method="post" data-form="update" autocomplete="off">
            <input type="hidden" name="user_id" value="<?= $_SESSION['id_posup']; ?>">

            <div class="mb-3">
                <label for="nombre_up" class="form-label">Tu nombre completo</label>
                <input type="text" class="form-control" id="nombre_up" value="<?= $campos['nombre'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="email_up" class="form-label">Correo electronico</label>
                <input type="text" class="form-control" id="email_up" value="<?= $campos['correo'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="pass_up" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="pass_up" name="pass_up">
            </div>


            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Actualizar contraseña</button>
            </div>


        </form>
    </div>
</div>