<?php
require_once "../controladores/RedesSociales.controladores.php";
require_once "../modelos/RedesSociales.modelo.php";

class AjaxRedesSociales
{

    /* ===========================
    EDITAR REDES SOCIALES
    =========================== */

    public $idRedes;

    public function ajaxEditarRedesSociales()
    {

        $item = "id_redes";
        $valor = $this->idRedes;

        $respuesta = ControladorRedesSociales::ctrMostrarRedesSociales($item, $valor);

        echo json_encode($respuesta);

    }

}

/* ===========================
 EDITAR REDES SOCIALES
=========================== */

if(isset($_POST["idRedes"]))
{

    $editar = new AjaxRedesSociales();
    $editar->idRedes = $_POST["idRedes"];
    $editar->ajaxEditarRedesSociales();

}

?>