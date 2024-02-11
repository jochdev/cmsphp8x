<div id="wrapperuno">
    <div class="row text-center">
        <h1>Crea tu biblioteca personal en PDF</h1>
        <p>Guarda tus publicaciones favoritas en PDF para leerlas sin conexión a internet.</p>
    </div>

    <div class="row">
        <form action="<?php echo SERVERURL; ?>pdf/autores.php" method="get" autocomplete="off">



            <div class="mb-3">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" placeholder="Jose" required>
            </div>

            <select class="form-select mb-3" name="tipo">
                <option selected>Deseas agregar un rango de fecha?</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>

            <div class="mb-3">
                <label for="desde">Desde</label>
                <input type="date" class="form-control" id="desde" name="to" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="hasta">Desde</label>
                <input type="date" class="form-control" id="hasta" name="from" placeholder="name@example.com">
            </div>


            <div class="d-grid gap-2 ">
                <button class="btn btn-primary" type="submit">Obtener PDF</button>
            </div>


        </form>
    </div>



</div>