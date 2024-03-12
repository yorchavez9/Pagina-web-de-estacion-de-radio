<?php
require_once "../controladores/Conductor.controlador.php";
require_once "../modelos/Conductor.modelo.php";

class AjaxConductor
{

    /* ===========================
    EDITAR CONDUCTOR
    =========================== */

    public $idConductor;

    public function ajaxEditarConductor()
    {

        $item = "id_conductor";
        $valor = $this->idConductor;

        $respuesta = ControladorConductor::ctrMostrarConductores($item, $valor);

        echo json_encode($respuesta);

    }


    /* ===========================
    ACTIVAR CONDUCTOR
    =========================== */

    public $activarConductor;
    public $activarId;

    public function ajaxActivarConductor()
    {

        $tabla = "conductores";

        $item1 = "estado";
        $valor1 = $this->activarConductor;

        $item2 = "id_conductor";
        $valor2 = $this->activarId;

        $respuesta = ModeloConductor::mdlActualizarConductor($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR CONDUCTOR
=========================== */

if(isset($_POST["idConductor"]))
{

    $editar = new AjaxConductor();
    $editar->idConductor = $_POST["idConductor"];
    $editar->ajaxEditarConductor();

}

/* ===========================
 ACTIVAR CONDUCTOR
=========================== */

if(isset($_POST["activarConductor"]))
{

    $activarConductor = new AjaxConductor();
    $activarConductor->activarConductor = $_POST["activarConductor"];
    $activarConductor->activarId = $_POST["activarId"];
    $activarConductor->ajaxActivarConductor();

}
?>