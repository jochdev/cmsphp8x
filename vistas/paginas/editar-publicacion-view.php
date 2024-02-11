<?php
require_once "./controladores/publicacionControlador.php";
$mainModel = new mainModel();
$instancia_controlador = new publicacionControlador();

$autor =  $instancia_controlador->datos_publicacion_controlador("Unico", $pagina[1]);
if ($autor->rowCount() == 1) {
    $campos = $autor->fetch();
}

?>
<div id="wrapperuno">
    <div class="container py-4">
        <h2>¡Actualiza esta obra con nueva información!</h2>
        <p>Completa el siguiente formulario para crear una cuenta gratuita y convertirte en un explorador del conocimiento.</p>
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/publicacionesAjax.php" method="post" data-form="update" autocomplete="off">
            <input type="hidden" name="publicacion_id" value="<?php echo $pagina[1]; ?>">

            <div class="mb-3">
                <label for="titulo_up" class="form-label">Ingresa el titulo del libro</label>
                <input type="text" class="form-control" id="titulo_up" name="titulo_up" value="<?= $campos['titulo'] ?>">
            </div>
            <div class="mb-3">
                <label for="resumen_up" class="form-label">Ingresa un resumen del libro</label>
                <input type="text" class="form-control" id="resumen_up" name="resumen_up" value="<?= $campos['contenido'] ?>">
            </div>

            <div class="mb-3">
                <label for="autor_up" class="form-label">¿Quién es el autor?</label>
                <input type="text" class="form-control" id="autor_up" name="autor_up" disabled value="<?= $campos['autor'] ?>">
            </div>

            <div class="mb-3">
                <label for="fecha_up" class="form-label">¿Cuándo fue publicado este libro?</label>
                <input type="date" class="form-control" id="fecha_up" name="fecha_up" value="<?= $campos['fecha_publicacion'] ?>">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>

        </form>
        <form class="FormularioAjax" action="<?= SERVERURL; ?>ajax/publicacionesAjax.php" method="POST" data-form="delete" autocomplete="off">


            <input type="hidden" name="publicacion_id_del" value="<?php echo $pagina[1]; ?>">

            <div class="d-grid gap-2">
                <button class="btn btn-secundary" type="submit">Eliminar</button>
            </div>
        </form>


    </div>
</div>