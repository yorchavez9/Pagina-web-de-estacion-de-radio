<?php
require_once "../controladores/Ranking.controlador.php";
require_once "../modelos/Ranking.modelo.php";

class AjaxRanking
{

    /* ===========================
    EDITAR RANKING
    =========================== */

    public $idRanking;

    public function ajaxEditarRanking()
    {

        $item = "id_ranking";
        $valor = $this->idRanking;

        $respuesta = ControladorRanking::ctrMostrarRanking($item, $valor);

        echo json_encode($respuesta);

    }




}

/* ===========================
 EDITAR VIDEO
=========================== */

if(isset($_POST["idRanking"]))
{

    $editar = new AjaxRanking();
    $editar->idRanking = $_POST["idRanking"];
    $editar->ajaxEditarRanking();

}



?>