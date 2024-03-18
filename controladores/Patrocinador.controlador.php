<?php

class ControladorPatrocinador
{


    /* ==========================
    MOSTRAR PATROCINADOR
    ========================== */

    static public function ctrMostrarPatrocinador($item, $valor)
    {
        $tabla = "patrocinadores";

        $respuesta = ModeloPatrocinador::mdlMostrarPatrocinador($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE PATROCINADORES
    ========================== */

    static public function ctrCrearPatrocinador()
    {

        if (isset($_POST["nombre"])) {


            $tabla = "patrocinadores";

            $datos = array(
                "nombre" => $_POST["nombre"],
                "empresa" => $_POST["empresa"],
                "correo" => $_POST["correo"],
                "telefono" => $_POST["telefono"],
                "sitio_web" => $_POST["sitio_web"],
                "direccion" => $_POST["direccion"],
                "mensaje" => $_POST["mensaje"]
            );

            $respuesta = ModeloPatrocinador::mdlIngresarPatrocinador($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos han sido enviados!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "patrocinador";
                            }
                        });

                    </script>';
            }
        }
    }

 

    /* ==========================
    BORRAR PATROCINADOR
    ========================== */

    static public function ctrBorrarPatrocinador()
    {

        if (isset($_GET["idPatrocinador"])) {

            $tabla = "patrocinadores";

            $datos = $_GET["idPatrocinador"];

            $respuesta = ModeloPatrocinador::mdlBorrarPatrocinador($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				Swal.fire({
					  icon: "success",
					  title: "El patrocinador ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "patrocinadores";

								}
							})

				</script>';
            }
        }
    }
}
