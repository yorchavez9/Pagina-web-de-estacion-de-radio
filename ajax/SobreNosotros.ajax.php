<?php
require_once "../controladores/Evento.controlador.php";
require_once "../modelos/Evento.modelo.php";

class AjaxEvento
{

    /* ===========================
    EDITAR EVENTO
    =========================== */

    public $idEvento;

    public function ajaxEditarEvento()
    {

        $item = "id_evento";
        $valor = $this->idEvento;

        $respuesta = ControladorEvento::ctrMostrarEvento($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR EVENTO
    =========================== */

    public $activarEvento;
    public $activarId;

    public function ajaxactivarEvento()
    {

        $tabla = "eventos";

        $item1 = "estado";
        $valor1 = $this->activarEvento;

        $item2 = "id_evento";
        $valor2 = $this->activarId;

        $respuesta = ModeloEvento::mdlActualizarEvento($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR EVENTO
=========================== */

if(isset($_POST["idEvento"]))
{

    $editar = new AjaxEvento();
    $editar->idEvento = $_POST["idEvento"];
    $editar->ajaxEditarEvento();

}

/* ===========================
 ACTIVAR EVENTO
=========================== */

if(isset($_POST["activarEvento"]))
{

    $activarEvento = new AjaxEvento();
    $activarEvento->activarEvento = $_POST["activarEvento"];
    $activarEvento->activarId = $_POST["activarId"];
    $activarEvento->ajaxactivarEvento();

}

?>