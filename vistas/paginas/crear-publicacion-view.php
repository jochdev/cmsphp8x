<div id="wrapperuno">
    <div class=" container mt-5">
        <div class="row text-center">
            <h2>¡Comparte esta obra con la comunidad! </h2>
            <p>Completa este formulario para registrar tu publicación en nuestro catálogo.</p>
        </div>
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/publicacionesAjax.php" method="post" autocomplete="off">

            <div class="mb-3">
                <label for="titulo_reg" class="form-label">Ingresa el titulo del libro</label>
                <input type="text" class="form-control" id="titulo_reg" name="titulo_reg" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="resumen_reg" class="form-label">Ingresa un resumen del libro</label>
                <input type="text" class="form-control" id="resumen_reg" name="resumen_reg" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="autor_reg" class="form-label">¿Quién es el autor?</label>
                <input type="text" class="form-control" id="autor_reg" name="autor_reg" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="fecha_reg" class="form-label">¿Cuándo fue publicado este libro?</label>
                <input type="date" class="form-control" id="fecha_reg" name="fecha_reg" aria-describedby="emailHelp">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary block">Registrar</button>
            </div>


        </form>

    </div>
</div>