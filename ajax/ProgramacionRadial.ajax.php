<?php
require_once "../controladores/ProgramacionRadial.controlador.php";
require_once "../modelos/ProgramacionRadial.modelo.php";

class AjaxProgramacionRadial
{

    /* ===========================
    EDITAR PROGRAMACION RADIAL
    =========================== */

    public $idRadial;

    public function ajaxEditarProgramacionRadial()
    {

        $item = "id_radial";
        $valor = $this->idRadial;

        $respuesta = ControladorProgramacionRadial::ctrMostrarProgramacionRadial($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR PROGRAMACION RADIAL
    =========================== */

    public $activarRadial;
    public $activarId;

    public function ajaxactivarProgramacionRadial()
    {

        $tabla = "programaciones_radial";

        $item1 = "estado";
        $valor1 = $this->activarRadial;

        $item2 = "id_radial";
        $valor2 = $this->activarId;

        $respuesta = ModeloProgramacionRadial::mdlActualizarProgramacionRadial($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR PROGRAMACION RADIAL
=========================== */

if(isset($_POST["idRadial"]))
{

    $editar = new AjaxProgramacionRadial();
    $editar->idRadial = $_POST["idRadial"];
    $editar->ajaxEditarProgramacionRadial();

}

/* ===========================
 ACTIVAR PROGRAMACION RADIAL
=========================== */

if(isset($_POST["activarRadial"]))
{

    $activarRadial = new AjaxProgramacionRadial();
    $activarRadial->activarRadial = $_POST["activarRadial"];
    $activarRadial->activarId = $_POST["activarId"];
    $activarRadial->ajaxactivarProgramacionRadial();

}

?>