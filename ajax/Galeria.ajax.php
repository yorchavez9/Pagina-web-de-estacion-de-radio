<?php
require_once "../controladores/Galeria.controlador.php";
require_once "../modelos/Galeria.modelo.php";

class AjaxGaleria
{

    /* ===========================
    EDITAR GALERIA
    =========================== */

    public $idGaleria;

    public function ajaxEditarGaleria()
    {

        $item = "id_galeria";
        $valor = $this->idGaleria;

        $respuesta = ControladorGaleria::ctrMostrarGaleria($item, $valor);


        echo json_encode($respuesta);

    }


}

/* ===========================
 EDITAR GALERIA
=========================== */

if(isset($_POST["idGaleria"]))
{

    $editar = new AjaxGaleria();
    $editar->idGaleria = $_POST["idGaleria"];
    $editar->ajaxEditarGaleria();

}


?>