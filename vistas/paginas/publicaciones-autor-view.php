<?php
require_once "./controladores/publicacionControlador.php";
$mainModel = new mainModel();
$instancia_controlador = new publicacionControlador();

$autor =  $instancia_controlador->datos_publicacion_controlador("Unico", $pagina[1]);
if ($autor->rowCount() == 1) {
    $campos = $autor->fetch();
}

$lista =  $instancia_controlador->listar_publicacion_autor_controlador($campos['autor']);
$contador = 0;


$cards = "";

foreach ($lista as $fila) {
    $contador = $contador + 1;

    $cards .= '
            <div class="col-12 mb-2">
            <div class="card card-post rounded shadow-sm">
                <div class="card-body">
                    <h3>' . $fila['titulo'] . '</h3>
                    <p>' . $fila['contenido'] . '</p>
                    <div>
                    <span>' . $fila['autor'] . '</span>
                    <span>' . $fila['fecha_publicacion'] . '</span>
                    </div>
                </div>

            </div>
        </div>
            ';
}

?>
<div id="wrapper">
    <div class="container mt-5">
        <h2 class="text-start mb-3"> <?= $campos['autor']; ?> </h2>

        <div class="row">
            <?php

            echo $cards;
            ?>


        </div>
    </div>
</div>