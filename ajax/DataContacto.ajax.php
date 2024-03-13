<?php
require_once "../controladores/DatosContacto.controlador.php";
require_once "../modelos/DatosContacto.modelo.php";

class AjaxDatosContacto
{

    /* ===========================
    EDITAR DATOS DE CONTACTO
    =========================== */

    public $idDatosContacto;

    public function ajaxEditarDatosContacto()
    {

        $item = "id_data_contacto";
        $valor = $this->idDatosContacto;

        $respuesta = ControladorDatosContacto::ctrMostrarDatosContacto($item, $valor);

        echo json_encode($respuesta);

    }

}

/* ===========================
 EDITAR DATOS DE CONTACTO
=========================== */

if(isset($_POST["idDatosContacto"]))
{

    $editar = new AjaxDatosContacto();
    $editar->idDatosContacto = $_POST["idDatosContacto"];
    $editar->ajaxEditarDatosContacto();

}

?>