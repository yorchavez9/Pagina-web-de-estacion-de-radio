<?php
require_once "../controladores/MesajeContacto.controlador.php";
require_once "../modelos/MensajeContacto.modelo.php";

class AjaxMensaje
{

    /* ===========================
    VER MENSAJE
    =========================== */

    public $idMensaje;

    public function ajaxVerMensaje()
    {

        $item = "id_contacto";
        $valor = $this->idMensaje;

        $respuesta = ControladorMensaje::ctrMostrarMensaje($item, $valor);

        echo json_encode($respuesta);

    }


    /* ===========================
    ACTIVAR MENSAJE
    =========================== */

    public $activarMensaje;
    public $activarId;

    public function ajaxActivarMensaje()
    {

        $tabla = "contactos";

        $item1 = "estado";
        $valor1 = $this->activarMensaje;

        $item2 = "id_contacto";
        $valor2 = $this->activarId;

        $respuesta = ModeloMensaje::mdlActualizarMensaje($tabla, $item1, $valor1, $item2, $valor2);

    }



}

/* ===========================
 VER MENSAJE
=========================== */

if(isset($_POST["idMensaje"]))
{

    $editar = new AjaxMensaje();
    $editar->idMensaje = $_POST["idMensaje"];
    $editar->ajaxVerMensaje();

}

/* ===========================
 ACTIVAR USUARIO
=========================== */

if(isset($_POST["activarMensaje"]))
{

    $activarMensaje = new AjaxMensaje();
    $activarMensaje->activarMensaje = $_POST["activarMensaje"];
    $activarMensaje->activarId = $_POST["activarId"];
    $activarMensaje->ajaxActivarMensaje();

}



?>