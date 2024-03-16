<?php
require_once "../controladores/Anuncioa.controlador.php";
require_once "../modelos/Anuncioa.modelo.php";

class AjaxAnuncioA
{

    /* ===========================
    EDITAR ANUNCIO A
    =========================== */

    public $idAnuncioA;

    public function ajaxEditarAnuncioA()
    {

        $item = "id_anuncioA";
        $valor = $this->idAnuncioA;

        $respuesta = ControladorAnuncioA::ctrMostrarAnuncioA($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR ANUNCIO A
    =========================== */

    public $activarAnuncioA;
    public $activarId;

    public function ajaxactivarAnuncioA()
    {

        $tabla = "anunciosa";

        $item1 = "estado";
        $valor1 = $this->activarAnuncioA;

        $item2 = "id_anuncioA";
        $valor2 = $this->activarId;

        $respuesta = ModeloAnuncioA::mdlActualizarAnuncioA($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR ANUNCIO A
=========================== */

if(isset($_POST["idAnuncioA"]))
{

    $editar = new AjaxAnuncioA();
    $editar->idAnuncioA = $_POST["idAnuncioA"];
    $editar->ajaxEditarAnuncioA();

}

/* ===========================
 ACTIVAR ANUNCIO A
=========================== */

if(isset($_POST["activarAnuncioA"]))
{

    $activarAnuncioA = new AjaxAnuncioA();
    $activarAnuncioA->activarAnuncioA = $_POST["activarAnuncioA"];
    $activarAnuncioA->activarId = $_POST["activarId"];
    $activarAnuncioA->ajaxactivarAnuncioA();

}

?>