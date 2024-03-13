<?php
require_once "../controladores/ProgramacionTV.controlador.php";
require_once "../modelos/ProgramacionTV.modelo.php";

class AjaxProgramacionTV
{

    /* ===========================
    EDITAR PROGRAMACION TV
    =========================== */

    public $idTV;

    public function ajaxEditarProgramacionTV()
    {

        $item = "id_tv";
        $valor = $this->idTV;

        $respuesta = ControladorProgramacionTV::ctrMostrarProgramacionTV($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR PROGRAMACION TV
    =========================== */

    public $activarTV;
    public $activarId;

    public function ajaxactivarProgramacionTV()
    {

        $tabla = "programaciones_tv";

        $item1 = "estado";
        $valor1 = $this->activarTV;

        $item2 = "id_tv";
        $valor2 = $this->activarId;

        $respuesta = ModeloProgramacionTV::mdlActualizarProgramacionTv($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR PROGRAMACION TV
=========================== */

if(isset($_POST["idTV"]))
{

    $editar = new AjaxProgramacionTV();
    $editar->idTV = $_POST["idTV"];
    $editar->ajaxEditarProgramacionTV();

}

/* ===========================
 ACTIVAR PROGRAMACION TV
=========================== */

if(isset($_POST["activarTV"]))
{

    $activarTV = new AjaxProgramacionTV();
    $activarTV->activarTV = $_POST["activarTV"];
    $activarTV->activarId = $_POST["activarId"];
    $activarTV->ajaxactivarProgramacionTV();

}

?>