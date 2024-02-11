<div class=" container mt-5">
    <div class="row mb-5">
        <h1 class="text-center">Hola <span style="color: #0085C8;"><?= $_SESSION['nombre_posup']; ?></span> <br>
            Qué quieres hacer hoy?</h1>
    </div>
    <div class="row">

        <div class="col-12 col-md-6 p-2">
            <div class="card card-post shadow-sm">
                <div class="card-body"><a href="<?php SERVERURL; ?>/publicaciones">
                        <h3 class="titlecardaccount">Ver publicaciones</h3>
                    </a>

                    <p>Visualiza los libros publicados.</p>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-6 p-2">
            <div class="card card-post shadow-sm">
                <div class="card-body"><a href="<?php SERVERURL; ?>/generar-pdf">
                        <h3 class="titlecardaccount">Generar PDF</h3>
                    </a>

                    <p>Exportar los registros facilmente.</p>
                </div>

            </div>
        </div>


        <div class="col-12 col-md-6 p-2">
            <div class="card card-post shadow-sm">
                <div class="card-body"><a href="<?php SERVERURL; ?>/crear-publicacion">
                        <h3 class="titlecardaccount">Crear una publicación</h3>
                    </a>

                    <p> Agrega publicaciones para todos.</p>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6 p-2">

            <div class="card card-post shadow-sm">
                <div class="card-body">
                    <a href="<?php SERVERURL; ?>/mi-perfil">
                        <h3 class="titlecardaccount">Acceder a mi perfil</h3>
                    </a>

                    <p>Gestiona tu cuenta fácilmente.</p>
                </div>

            </div>
        </div>

    </div>
</div>