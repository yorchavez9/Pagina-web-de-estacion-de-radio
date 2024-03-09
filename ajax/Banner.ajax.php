<?php
require_once "../controladores/Banner.controlador.php";
require_once "../modelos/Banner.modelo.php";

class AjaxBanner
{

    /* ===========================
    EDITAR BANNER
    =========================== */

    public $idBanner;

    public function ajaxEditarBanner()
    {

        $item = "id_banner";
        $valor = $this->idBanner;

        $respuesta = ControladorBanner::ctrMostrarBanners($item, $valor);


        echo json_encode($respuesta);

    }


}

/* ===========================
 EDITAR BANNER
=========================== */

if(isset($_POST["idBanner"]))
{

    $editar = new AjaxBanner();
    $editar->idBanner = $_POST["idBanner"];
    $editar->ajaxEditarBanner();

}


?>