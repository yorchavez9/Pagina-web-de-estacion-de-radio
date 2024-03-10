<?php
session_start();
setlocale(LC_ALL, 'es_ES');
date_default_timezone_set('America/Lima');

if(isset($_SESSION["iniciarSesion"]) && ($_SESSION["iniciarSesion"] == "ok") && ($_SESSION["perfil"] == "administrador" || $_SESSION["perfil"] == "ayudante")){
    
    include "modulos/admin/layouts/head.php";

    echo '<div class="wrapper">';

    include "modulos/admin/sidebar.php";

    include "modulos/admin/header.php";

    if (isset($_GET["ruta"])) {

        if (
            $_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "categorias" ||
            $_GET["ruta"] == "banners" ||
            $_GET["ruta"] == "noticias" ||
            $_GET["ruta"] == "rankings" ||
            $_GET["ruta"] == "videos" ||
            $_GET["ruta"] == "salir"
        ) {

            include "modulos/admin/" . $_GET["ruta"] . ".php";
        } else {

            include "modulos/admin/404.php";
        }
    } else {
        include "modulos/admin/inicio.php";
    }

    include "modulos/admin/footer.php";

    echo '</div>';

    include "modulos/admin/layouts/footer.php";

}else{
    include "modulos/main/layouts/head.php";

    include "modulos/main/navbar.php";

    echo '<main class="site-body">';

    if(isset($_GET["ruta"]))
    {

        if(
            $_GET["ruta"] == "inicio"
          )
        {
            include "modulos/main/".$_GET["ruta"].".php";
        }else{
            include "modulos/main/404.php";
        }

    }else{
        include "modulos/main/inicio.php";
    }

    echo '</main>';

    include "modulos/main/login.php";

    include "modulos/main/layouts/footer.php";
    

}

?>