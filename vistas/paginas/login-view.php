<div id="wrapperuno">
    <div class="container mt-5">

        <div class="row mb-5">
            <h1 class="titleh1 text-center">Ingresa a tu cuenta y descubre miles de libros que te esperan en PosUp</h1>
        </div>
        <form action="" method="post" class="mb-4" autocomplete="off">

            <div class="mb-3">
                <label for="usuario_log" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="usuario_log" aria-describedby="emailHelp" name="usuario_log">
            </div>
            <div class="mb-3">
                <label for="clave_log" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave_log" name="clave_log">
            </div>


            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Ingresar</button>
            </div>
        </form>





        <div class="mt-5 text-center">
            <a href="<?= SERVERURL; ?>registro">¿Eres nuevo? Regístrate aquí</a>.
        </div>



    </div>
</div>



<?php
if (isset($_POST['usuario_log']) && isset($_POST['clave_log'])) {
    require_once "./controladores/loginControlador.php";

    $ins_login = new loginControlador();

    $ins_login->iniciar_sesion_controlador();
}
?>