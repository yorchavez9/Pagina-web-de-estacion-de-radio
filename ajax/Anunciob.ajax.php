<?php
require_once "../controladores/Anunciob.controlador.php";
require_once "../modelos/Anunciob.modelo.php";

class AjaxAnuncioB
{

    /* ===========================
    EDITAR ANUNCIO B
    =========================== */

    public $idAnuncioB;

    public function ajaxEditarAnuncioB()
    {

        $item = "id_anuncioB";
        $valor = $this->idAnuncioB;

        $respuesta = ControladorAnuncioB::ctrMostrarAnuncioB($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR ANUNCIO B
    =========================== */

    public $activarAnuncioB;
    public $activarId;

    public function ajaxactivarAnuncioB()
    {

        $tabla = "anunciosb";

        $item1 = "estado";
        $valor1 = $this->activarAnuncioB;

        $item2 = "id_anuncioB";
        $valor2 = $this->activarId;

        $respuesta = ModeloAnuncioB::mdlActualizarAnuncioB($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR ANUNCIO B
=========================== */

if(isset($_POST["idAnuncioB"]))
{

    $editar = new AjaxAnuncioB();
    $editar->idAnuncioB = $_POST["idAnuncioB"];
    $editar->ajaxEditarAnuncioB();

}

/* ===========================
 ACTIVAR ANUNCIO B
=========================== */

if(isset($_POST["activarAnuncioB"]))
{

    $activarAnuncioB = new AjaxAnuncioB();
    $activarAnuncioB->activarAnuncioB = $_POST["activarAnuncioB"];
    $activarAnuncioB->activarId = $_POST["activarId"];
    $activarAnuncioB->ajaxactivarAnuncioB();

}

?>