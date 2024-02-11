<div id="wrapperuno">
    <div class="container mt-5">
        <div class="row">
            <h1 class="titleh1 text-center">¡Únete a la comunidad posUP</h1>
            <p class="text-center">Completa el siguiente formulario para crear una cuenta gratuita y convertirte en un explorador del conocimiento.</p>
            </p>
        </div>
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/registro.php" method="post" autocomplete="off">

            <div class="mb-3">
                <label for="nombre_reg" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre_reg" name="nombre_reg" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email_reg" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email_reg" name="email_reg" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="pass_red" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass_red" name="pass_red">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" ">Registrarme</button>
        </div>
    </form>

    <div class=" mt-5 text-center">
                    <a href="<?= SERVERURL; ?>">¿Tienes cuenta? Ingresa aquí</a>.
            </div>
    </div>
</div>