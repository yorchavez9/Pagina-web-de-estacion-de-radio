<?php

class ControladorSobreNosotros
{

    /* ==========================
    MOSTRAR SOBRE NOSOTROS
    ========================== */

    static public function ctrMostrarSobreNosotros($item, $valor)
    {
        $tabla = "sobrenosotros";

        $respuesta = ModeloSobreNosotros::mdlMostrarSobreNosotros($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO SOBRE NOSOTROS
    ============================= */

    static public function ctrCrearSobreNosotros()
    {

        if (isset($_POST["titulo"])) {


            $tabla = "sobreNosotros";

            $datos = array(
                "titulo" => $_POST["titulo"],
                "descripcion" => $_POST["descripcion"]            );

            $respuesta = ModeloSobreNosotros::mdlIngresarSobreNosotros($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡El evento fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "sobreNosotros";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR SOBRE NOSOTROS
    ============================= */

    static public function ctrEditarSobreNosotros()
    {

        if (isset($_POST["id_evento"])) {


            $tabla = "sobrenosotros";


            $datos = array(
                "id_evento" => $_POST["id_evento"],
                "titulo" => $_POST["editTitulo"],
                "fecha" => $_POST["editFecha"]
            );

            $respuesta = ModeloSobreNosotros::mdlEditarSobreNosotros($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La noticia fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "sobreNosotros";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR SOBRE NOSOTROS
    ========================== */

    static public function ctrBorrarSobreNosotros(){

		if(isset($_GET["idEvento"])){

			$tabla ="eventos";
			$datos = $_GET["idEvento"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloSobreNosotros::mdlBorrarSobreNosotros($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El evento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "sobreNosotros";

								}
							})

				</script>';

			}		

		}

	}
}
