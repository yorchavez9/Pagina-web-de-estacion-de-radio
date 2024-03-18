<?php
require_once "../controladores/SobreNosotros.controlador.php";
require_once "../modelos/SobreNosotros.modelo.php";

class AjaxSobreNosotros
{

    /* ===========================
    EDITAR SOBRE NOSOTROS
    =========================== */

    public $idSobreNosotros;

    public function ajaxEditarSobreNosotros()
    {

        $item = "id_sobre_nosotros";
        $valor = $this->idSobreNosotros;

        $respuesta = ControladorSobreNosotros::ctrMostrarSobreNosotros($item, $valor);


        echo json_encode($respuesta);

    }

}

/* ===========================
 EDITAR SOBRE NOSOTROS
=========================== */

if(isset($_POST["idSobreNosotros"]))
{

    $editar = new AjaxSobreNosotros();
    $editar->idSobreNosotros = $_POST["idSobreNosotros"];
    $editar->ajaxEditarSobreNosotros();

}


?>