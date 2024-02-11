<div id="wrapper">
    <div class="container mt-5">
        <h2 class="text-start mb-3">Publicaciones </h2>


        <div class="row">
            <?php
            require_once "./controladores/publicacionControlador.php";
            $ins_departemento = new publicacionControlador();
            $mainModel = new mainModel();

            $lista =  $ins_departemento->listar_publicacion_controlador();
            $contador = 0;

            $cards = "";

            foreach ($lista as $fila) {
                $contador = $contador + 1;
                $cards .= '
            <div class="col-12 mb-2">
            <div class="card card-post rounded shadow-sm">
                <div class="card-body">
                    
                    <a href="' . SERVERURL . 'editar-publicacion/' . mainModel::encryption($fila['id']) . '"><h3>' . $fila['titulo'] . '</h3></a>
                    
                    <p>' . $fila['contenido'] . '</p>
                    <div>
                    <a href="' . SERVERURL . 'publicaciones-autor/' . mainModel::encryption($fila['id']) . '"><span>' . $fila['autor'] . '</span></a>
                        
                        <span> Publicado el ' . $fila['fecha_publicacion'] . '</span>
                    </div>
                </div>

            </div>
        </div>
            ';
            }
            echo $cards;
            ?>


        </div>
    </div>
</div>