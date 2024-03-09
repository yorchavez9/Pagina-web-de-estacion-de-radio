<?php
session_start();

if(isset($_SESSION["iniciarSesion"]) && ($_SESSION["iniciarSesion"] == "ok") && ($_SESSION["perfil"] == "administrador")){
    
    include "modulos/admin/layouts/head.php";

    echo '<div class="wrapper">';

    include "modulos/admin/sidebar.php";

    include "modulos/admin/header.php";

    if (isset($_GET["ruta"])) {

        if (
            $_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
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