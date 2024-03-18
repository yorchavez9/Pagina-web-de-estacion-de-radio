<?php

class ControladorRanking
{


    /* ==========================
    MOSTRAR RANKING
    ========================== */

    static public function ctrMostrarRanking($item, $valor)
    {
        $tabla = "ranking";

        $respuesta = ModeloRanking::mdlMostrarRanking($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE RANKING
    ========================== */

    static public function ctrCrearRanking()
    {

        if (isset($_POST["puesto"])) {


            $tabla = "ranking";

            $datos = array(
                "puesto" => $_POST["puesto"],
                "cancion" => $_POST["cancion"],
                "artista" => $_POST["artista"],
                "letra" => $_POST["letra"],
                "video_url" => $_POST["video_url"]
            );

            $respuesta = ModeloRanking::mdlIngresarRanking($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos del video ha sido guardado!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "rankings";
                            }
                        });

                    </script>';
            }
        }
    }

    /* ==========================
    EDITAR RANKING
    ========================== */

    static public function ctrEditarRanking()
    {

        if (isset($_POST["id_ranking"])) {


            $tabla = "ranking";


            $datos = array(
                "id_ranking" => $_POST["id_ranking"],
                "puesto" => $_POST["editPuesto"],
                "cancion" => $_POST["editCancion"],
                "artista" => $_POST["editArtista"],
                "letra" => $_POST["editLetra"],
                "video_url" => $_POST["editVideo_url"]
            );

            $respuesta = ModeloRanking::mdlEditarRanking($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    Swal.fire({
                          icon: "success",
                          title: "El video ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "rankings";

                                    }
                                })

                    </script>';
            }
        }
    }

    /* ==========================
    BORRAR RANKING
    ========================== */

    static public function ctrBorrarRanking()
    {

        if (isset($_GET["idRanking"])) {

            $tabla = "ranking";

            $datos = $_GET["idRanking"];

            $respuesta = ModeloRanking::mdlBorrarRanking($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				Swal.fire({
					  icon: "success",
					  title: "El ranking ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "rankings";

								}
							})

				</script>';
            }
        }
    }
}
