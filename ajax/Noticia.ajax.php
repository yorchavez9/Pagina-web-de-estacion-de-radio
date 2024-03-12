<?php
require_once "../controladores/Noticia.controlador.php";
require_once "../modelos/Noticia.modelo.php";

class AjaxNoticia
{

    /* ===========================
    EDITAR NOTICIA
    =========================== */

    public $idNoticia;

    public function ajaxEditarNoticia()
    {

        $item = "id_noticia";
        $valor = $this->idNoticia;

        $respuesta = ControladorNoticia::ctrMostrarNoticias($item, $valor);


        echo json_encode($respuesta);

    }

    /* ===========================
    ACTIVAR NOTICIA
    =========================== */

    public $activarNoticia;
    public $activarId;

    public function ajaxactivarNoticia()
    {

        $tabla = "noticias";

        $item1 = "estado";
        $valor1 = $this->activarNoticia;

        $item2 = "id_noticia";
        $valor2 = $this->activarId;

        $respuesta = ModeloNoticia::mdlActualizarNoticia($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR NOTICIA
=========================== */

if(isset($_POST["idNoticia"]))
{

    $editar = new AjaxNoticia();
    $editar->idNoticia = $_POST["idNoticia"];
    $editar->ajaxEditarNoticia();

}

/* ===========================
 ACTIVAR NOTICIA
=========================== */

if(isset($_POST["activarNoticia"]))
{

    $activarNoticia = new AjaxNoticia();
    $activarNoticia->activarNoticia = $_POST["activarNoticia"];
    $activarNoticia->activarId = $_POST["activarId"];
    $activarNoticia->ajaxactivarNoticia();

}

?>