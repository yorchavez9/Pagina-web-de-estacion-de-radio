<?php

class ControladorVideo
{


    /* ==========================
    MOSTRAR VIDEOS
    ========================== */

    static public function ctrMostrarVideos($item, $valor)
    {
        $tabla = "videos";

        $respuesta = ModeloVideo::mdlMostrarVideos($tabla, $item, $valor);

        return $respuesta;
    }

    /* ==========================
    REGISTRO DE VIDEO
    ========================== */

    static public function ctrCrearVideos()
    {

        if (isset($_POST["titulo"])) {


            $tabla = "videos";

            $datos = array(
                "titulo" => $_POST["titulo"],
                "video_url" => $_POST["video_url"]
            );

            $respuesta = ModeloVideo::mdlIngresarVideo($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                        Swal.fire({
                            icon: "success",
                            title: "¡Los datos del video ha sido guardado!",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(result){
                            if(result.value){
                                window.location = "videos";
                            }
                        });

                    </script>';
            }
        }
    }

    /* ==========================
    EDITAR VIDEO
    ========================== */

    static public function ctrEditarvideos()
    {

        if (isset($_POST["id_video"])) {


            $tabla = "videos";


            $datos = array(
                "id_video" => $_POST["id_video"],
                "titulo" => $_POST["editTitulo"],
                "video_url" => $_POST["editVideo_url"]
            );

            $respuesta = ModeloVideo::mdlEditarVideo($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    Swal.fire({
                          icon: "success",
                          title: "El video ha sido editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result) {
                                    if (result.value) {

                                    window.location = "videos";

                                    }
                                })

                    </script>';
            }
        }
    }

    /* ==========================
    BORRAR VIDEO
    ========================== */

    static public function ctrBorrarVideos()
    {

        if (isset($_GET["idVideo"])) {

            $tabla = "videos";

            $datos = $_GET["idVideo"];

            $respuesta = ModeloVideo::mdlBorrarVideo($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				Swal.fire({
					  icon: "success",
					  title: "El video ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "videos";

								}
							})

				</script>';
            }
        }
    }
}
