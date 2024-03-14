<?php

class ControladorMensaje
{

    /* ==========================
    MOSTRAR MENSAJES
    ========================== */

    static public function ctrMostrarMensaje($item, $valor)
    {
        $tabla = "contactos";

        $respuesta = ModeloMensaje::mdlMostrarMensaje($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE MENSAJES
    ========================== */

    static public function ctrCrearMensaje()
    {

        if (isset($_POST["nombre"])) {

            if (preg_match('/^[a-zA-Z0-9_.@]+$/', $_POST["correo"])) {

                $tabla = "contactos";


                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "correo" => $_POST["correo"],
                    "telefono" => $_POST["telefono"],
                    "compania" => $_POST["compania"],
                    "mensaje" => $_POST["mensaje"]
                );

                $respuesta = ModeloMensaje::mdlIngresarMensaje($tabla, $datos);

                if($respuesta == "ok")
                {

                    echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡El mensaje ha sido enviado!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "contactos";
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
                                window.location = "mensajeContacto";
                            }
                        });

                    </script>';
            }
        }
    }

  

    /* ==========================
    BORRAR MENSAJE
    ========================== */

    static public function ctrBorrarMensaje()
    {

        if(isset($_GET["idMensaje"])){

			$tabla ="contactos";
            
			$datos = $_GET["idMensaje"];

			$respuesta = ModeloMensaje::mdlBorrarMensaje($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El mensaje ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "mensajeContacto";

								}
							})

				</script>';

			}		

		}

    }
}
