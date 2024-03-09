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
        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE USUARIO
    ========================== */

    static public function ctrCrearUsuario()
    {

        if (isset($_POST["nombre"])) {

            if (preg_match('/^[a-zA-Z0-9_.@]+$/', $_POST["correo"])) {

                $tabla = "usuarios";

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "apellidos" => $_POST["apellidos"],
                    "perfil" => $_POST["perfil"],
                    "correo" => $_POST["correo"],
                    "password" => $encriptar
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if($respuesta == "ok")
                {

                    echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos del usuario han sido guardados!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "usuarios";
                            }
                        });

                    </script>';

                }

            } 
            else 
            {

                echo '<script>

                        Swal.fire({
                            icon: "error",
                            title: "¡El correo no puede llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "usuarios";
                            }
                        });

                    </script>';
            }
        }
    }

    /* ==========================
    EDITAR USUARIO
    ========================== */

    static public function ctrEditarUsuario()
    {

        if(isset($_POST["id_usuario"]))
        {

            if (preg_match('/^[a-zA-Z0-9_.@]+$/', $_POST["editCorreo"])) {

                $tabla = "usuarios";

                if ($_POST["editPassword"] != "") {

                    $encriptar = crypt($_POST["editPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                } else {

                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array(
                    "id_usuario" => $_POST["id_usuario"],
                    "nombre" => $_POST["editNombre"],
                    "apellidos" => $_POST["editApellidos"],
                    "perfil" => $_POST["editPerfil"],
                    "correo" => $_POST["editCorreo"],
                    "password" => $encriptar
                );

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    Swal.fire({
                          icon: "success",
                          title: "El usuario ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "usuarios";

                                    }
                                })

                    </script>';
                }

            }

        }

    }

    /* ==========================
    BORRAR USUARIO
    ========================== */

    static public function ctrBorrarUsuario()
    {

        if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
            
			$datos = $_GET["idUsuario"];

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

    }
}
