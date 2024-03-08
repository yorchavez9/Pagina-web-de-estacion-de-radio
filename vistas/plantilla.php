<?php
session_start();

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok" && $_SESSION["perfil"] != "usuario"){
    echo "admin";
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