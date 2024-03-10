<?php
require_once "../controladores/Video.controlador.php";
require_once "../modelos/Video.modelo.php";

class Ajaxvideo
{

    /* ===========================
    EDITAR VIDEO
    =========================== */

    public $idVideo;

    public function ajaxEditarVideo()
    {

        $item = "id_video";
        $valor = $this->idVideo;

        $respuesta = ControladorVideo::ctrMostrarVideos($item, $valor);

        echo json_encode($respuesta);

    }


    /* ===========================
    ACTIVAR VIDEO
    =========================== */

    public $activarVideo;
    public $activarId;

    public function ajaxActivarVideo()
    {

        $tabla = "videos";

        $item1 = "estado";
        $valor1 = $this->activarVideo;

        $item2 = "id_video";
        $valor2 = $this->activarId;

        $respuesta = ModeloVideo::mdlActualizarVideo($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/* ===========================
 EDITAR VIDEO
=========================== */

if(isset($_POST["idVideo"]))
{

    $editar = new Ajaxvideo();
    $editar->idVideo = $_POST["idVideo"];
    $editar->ajaxEditarVideo();

}

/* ===========================
 ACTIVAR VIDEO
=========================== */

if(isset($_POST["activarVideo"]))
{

    $activarVideo = new Ajaxvideo();
    $activarVideo->activarVideo = $_POST["activarVideo"];
    $activarVideo->activarId = $_POST["activarId"];
    $activarVideo->ajaxActivarVideo();

}



?>