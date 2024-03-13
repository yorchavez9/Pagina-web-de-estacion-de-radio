<?php

class ControladorRedesSociales
{


    /* ==========================
    MOSTRAR REDES SOCIALES
    ========================== */

    static public function ctrMostrarRedesSociales($item, $valor)
    {
        $tabla = "redes_sociales";

        $respuesta = ModeloRedesSociales::mdlMostrarRedesSociales($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE REDES SOCIALES
    ========================== */

    static public function ctrCrearRedesSociales()
    {

        if (isset($_POST["facebook"])) {


            $tabla = "redes_sociales";


            $datos = array(
                "facebook" => $_POST["facebook"],
                "whatsapp" => $_POST["whatsapp"],
                "youtube" => $_POST["youtube"],
                "linkedin" => $_POST["linkedin"],
                "twitter" => $_POST["twitter"],
                "tiktok" => $_POST["tiktok"],
                "instagram" => $_POST["instagram"]
            );

            $respuesta = ModeloRedesSociales::mdlIngresarRedesSociales($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos han sido guardados!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "redesSociales";
                            }
                        });

                    </script>';
            }
        }
    }

    /* ==========================
    EDITAR REDES SOCIALES
    ========================== */

    static public function ctrEditarRedesSociales()
    {

        if (isset($_POST["id_redes"])) {


            $tabla = "redes_sociales";


            $datos = array(
                "id_redes" => $_POST["id_redes"],
                "facebook" => $_POST["editFacebook"],
                "whatsapp" => $_POST["editWhatsapp"],
                "youtube" => $_POST["editYoutube"],
                "linkedin" => $_POST["editLinkedin"],
                "twitter" => $_POST["editTwitter"],
                "tiktok" => $_POST["editTiktok"],
                "instagram" => $_POST["editInstagram"]
            );

            $respuesta = ModeloRedesSociales::mdlEditarRedesSociales($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    Swal.fire({
                          icon: "success",
                          title: "El usuario ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "redesSociales";

                                    }
                                })

                    </script>';
            }
        }

    }

    /* ==========================
    BORRAR REDES SOCIALES
    ========================== */

    static public function ctrBorrarRedesSociales()
    {

        if(isset($_GET["idRedes"])){

			$tabla ="redes_sociales";
            
			$datos = $_GET["idRedes"];

			$respuesta = ModeloRedesSociales::mdlBorrarRedesSociales($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "Las redes sociales ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "redesSociales";

								}
							})

				</script>';

			}		

		}

    }
}
