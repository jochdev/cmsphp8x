<?php session_start(['name' => 'POSUP']); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="José Heredia">
    <title><?php echo COMPANY; ?></title>




    <?php include "./vistas/template/links.php"; ?>
</head>

<body>
    <!-- Navbar -->

    <?php
    $peticionAjax = false;
    require_once "./controladores/vistasControlador.php";
    $IV = new vistasControlador();
    $vistas = $IV->obtener_vistas_controlador();



    if ($vistas == "login"  || $vistas == "404" || $vistas == "registro" || $vistas == "confirm-registro") {

        require_once "./vistas/paginas/" . $vistas . "-view.php";
    } else {


        $pagina = explode("/", $_GET['views']);
        require_once "./controladores/loginControlador.php";
        $lc = new loginControlador();

        if (!isset($_SESSION['token_spm']) || !isset($_SESSION['usuario_posup']) || !isset($_SESSION['id_posup'])) {
            $lc->forzar_cierre_sesion_controlador();
            exit();
        }



    ?>
        <?php include "template/navbar.php"; ?>
        <main class="container-sm mt-5">
            <div class="row">
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8">
                    <?php include $vistas; ?>
                    <footer class="pt-3 mt-4 text-muted text-center ">
                        Creado por <a href="https://twitter.com/jochdev">jochdev</a> para <a href="https://twitter.com/posup">posup</a>
                    </footer>

                </div>
                <div class="col-12 col-md-2"></div>
            </div>


        </main>

    <?php
        include "template/logout.php";
    }
    ?>
    <?php include "template/scripts.php" ?>


</body>

</html>