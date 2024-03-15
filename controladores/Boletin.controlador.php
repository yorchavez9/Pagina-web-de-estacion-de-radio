<?php

class ControladorSuscriptor
{

    /* ==========================
    MOSTRAR SUSCRIPTOR
    ========================== */

    static public function ctrMostrarSuscriptor($item, $valor)
    {
        $tabla = "suscriptores";

        $respuesta = ModeloSuscriptor::mdlMostrarSuscriptor($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO SUSCRIPTOR
    ============================= */

    static public function ctrCrearSuscriptor()
    {

        if (isset($_POST["correoBeletin"])) {



            $tabla = "suscriptores";

            $datos = array(
                "correo" => $_POST["correoBeletin"]
            );

            $respuesta = ModeloSuscriptor::mdlIngresarSuscriptor($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡Te suscribiste con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
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
    BORRAR SUSCRIPTOR
    ========================== */

    static public function ctrBorrarSuscriptor(){

		if(isset($_GET["idSuscriptor"])){

			$tabla ="suscriptores";
			$datos = $_GET["idSuscriptor"];

			$respuesta = ModeloSuscriptor::mdlBorrarSuscriptor($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El suscriptor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "suscriptor";

								}
							})

				</script>';

			}		

		}

	}
}
