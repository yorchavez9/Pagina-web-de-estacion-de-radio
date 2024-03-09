<?php
require_once "../controladores/Usuario.controlador.php";
require_once "../modelos/Usuario.modelo.php";

class AjaxUsuarios
{

    /* ===========================
    EDITAR USUARIO
    =========================== */

    public $idUsuario;

    public function ajaxEditarUsuario()
    {

        $item = "id_usuario";
        $valor = $this->idUsuario;

        $respuesta = ControladorUsuario::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }


    /* ===========================
    ACTIVAR USUARIO
    =========================== */

    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario()
    {

        $tabla = "usuarios";

        $item1 = "estado";
        $valor1 = $this->activarUsuario;

        $item2 = "id_usuario";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }

    /* ===========================
    VALIDAR NO REPETIR USUARIO
    =========================== */

    public $validarCorreo;

    public function ajaxValidarUsuario()
    {

        $item = "correo";
        $valor = $this->validarCorreo;

        $respuesta = ControladorUsuario::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

}

/* ===========================
 EDITAR USUARIO
=========================== */

if(isset($_POST["idUsuario"]))
{

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();

}

/* ===========================
 ACTIVAR USUARIO
=========================== */

if(isset($_POST["activarUsuario"]))
{

    $activarUsuario = new AjaxUsuarios();
    $activarUsuario->activarUsuario = $_POST["activarUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];
    $activarUsuario->ajaxActivarUsuario();

}

/* ===========================
 VALIDAR NO REPETIR USUARIO
=========================== */

if(isset($_POST["validarCorreo"])){

    $validarCorreo = new AjaxUsuarios();
    $validarCorreo->validarCorreo = $_POST["validarCorreo"];
    $validarCorreo->ajaxValidarUsuario();

}



?>