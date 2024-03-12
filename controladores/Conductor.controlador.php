<?php

class ControladorConductor
{


    /* ==========================
    MOSTRAR CONDUCTOR
    ========================== */

    static public function ctrMostrarConductores($item, $valor)
    {
        $tabla = "conductores";

        $respuesta = ModeloConductor::mdlMostrarConductores($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE CONDUCTOR
    ========================== */

    static public function ctrCrearConductor()
    {

        if (isset($_POST["nombre"])) {

            if (preg_match('/^[a-zA-Z0-9_.@]+$/', $_POST["correo"])) {

                $tabla = "conductores";


                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "apellidos" => $_POST["apellidos"],
                    "tipo" => $_POST["tipo"],
                    "correo" => $_POST["correo"],
                    "telefono" => $_POST["telefono"],
                    "experiencia" => $_POST["experiencia"],
                    "habilidad" => $_POST["habilidad"]
                );

                $respuesta = ModeloConductor::mdlIngresarConductor($tabla, $datos);

                if($respuesta == "ok")
                {

                    echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos del conductor han sido guardados!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "conductores";
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
    EDITAR CONDUCTOR
    ========================== */

    static public function ctrEditarConductor()
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

                $respuesta = ModeloConductor::mdlEditarConductor($tabla, $datos);

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
    BORRAR CODUCTOR
    ========================== */

    static public function ctrBorrarConductor()
    {

        if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
            
			$datos = $_GET["idUsuario"];

			$respuesta = ModeloConductor::mdlBorrarConductor($tabla, $datos);

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
