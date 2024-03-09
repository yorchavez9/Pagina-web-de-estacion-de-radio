<?php

class ControladorUsuario
{

    /* ==========================
    INGRESO DE USUARIO
    ========================== */

    static public function ctrIngresoUsuario()
    {

        if (isset($_POST["correo"])) {

            if (preg_match('/^[a-zA-Z0-9_.@]+$/', $_POST["correo"])) {

                $password = $_POST["password"];

                $encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $item = "correo";

                $valor = $_POST["correo"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["correo"] == $_POST["correo"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["apellidos"] = $respuesta["apellidos"];
                        $_SESSION["correo"] = $respuesta["correo"];
                        $_SESSION["perfil"] = $respuesta["perfil"];

                        echo '<script>
                                window.location = "inicio";
                               </script>';
                    }
                }
            } else {
                echo
                '<script>
    
                    Swal.fire({
                        icon: "error",
                        title: "¡El correo no debe llevar caracteres especiales ni espacios!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    }).then(function(result){
                        if(result.value){
                            window.location = "inicio";
                        }
                    });
    
                </script>';
            }
        }
    }

    /* ==========================
    MOSTRAR USUARIOS
    ========================== */

    static public function ctrMostrarUsuarios($item, $valor)
    {
    }

    /* ==========================
    REGISTRO DE USUARIO
    ========================== */

    static public function ctrCrearUsuario()
    {
    }

    /* ==========================
    EDITAR USUARIO
    ========================== */

    static public function ctrEditarUsuario()
    {
    }

    /* ==========================
    BORRAR USUARIO
    ========================== */

    static public function ctrBorrarUsuario()
    {
    }
}
