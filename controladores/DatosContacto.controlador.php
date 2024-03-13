<?php

class ControladorDatosContacto
{


    /* ==========================
    MOSTRAR DATOS DE CONTACTO
    ========================== */

    static public function ctrMostrarDatosContacto($item, $valor)
    {
        $tabla = "data_contactos";

        $respuesta = ModeloDatosContacto::mdlMostrarDatosContacto($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE DATOS DE CONTACTO
    ========================== */

    static public function ctrCrearDatosContacto()
    {

        if (isset($_POST["localizacion"])) {


            $tabla = "data_contactos";


            $datos = array(
                "localizacion" => $_POST["localizacion"],
                "telefono" => $_POST["telefono"],
                "correo" => $_POST["correo"]
            );

            $respuesta = ModeloDatosContacto::mdlIngresarDatosContacto($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos han sido guardados!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "datosContacto";
                            }
                        });

                    </script>';
            }
        }
    }

    /* ==========================
    EDITAR DATOS DE CONTACTO
    ========================== */

    static public function ctrEditarDatosContacto()
    {

        if (isset($_POST["id_data_contacto"])) {


            $tabla = "data_contactos";


            $datos = array(
                "id_data_contacto" => $_POST["id_data_contacto"],
                "localizacion" => $_POST["editLocalizacion"],
                "telefono" => $_POST["editTelefono"],
                "correo" => $_POST["editCorreo"]
            );

            $respuesta = ModeloDatosContacto::mdlEditarDatosContacto($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    Swal.fire({
                          icon: "success",
                          title: "Los datos han sido editados correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "datosContacto";

                                    }
                                })

                    </script>';
            }
        }

    }

    /* ==========================
    BORRAR DATOS DE CONTACTO
    ========================== */

    static public function ctrBorrarDatosContacto()
    {

        if(isset($_GET["idDatosContacto"])){

			$tabla ="data_contactos";
            
			$datos = $_GET["idDatosContacto"];

			$respuesta = ModeloDatosContacto::mdlBorrarDatosContacto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "Las datos de contacto han sido borrados correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "datosContacto";

								}
							})

				</script>';

			}		

		}

    }
}
