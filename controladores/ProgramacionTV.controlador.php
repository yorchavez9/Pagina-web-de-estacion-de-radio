<?php

class ControladorProgramacionTV
{

    /* ==========================
    MOSTRAR PROGRAMACION TV
    ========================== */

    static public function ctrMostrarProgramacionTV($item, $valor)
    {
        $tablaTV = "programaciones_tv";
        $tablaC = "conductores";

        $respuesta = ModeloProgramacionTV::mdlMostrarProgramacionTV($tablaTV, $tablaC, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO PROGRAMACION TV
    ============================= */

    static public function ctrCrearProgramacionTV()
    {

        if (isset($_POST["id_conductor"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/programacionTV/";

            if (isset($_FILES["imagen"]["tmp_name"])) {

                $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

                $tipos_permitidos = array("jpg", "jpeg", "png", "gif");

                if (in_array(strtolower($extension), $tipos_permitidos)) {

                    $nombre_imagen = date("YmdHis") . rand(1000, 9999);

                    $ruta_imagen = $ruta . $nombre_imagen . "." . $extension;

                    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {

                        echo "Imagen subida correctamente.";
                    } else {

                        echo "Error al subir la imagen.";
                    }
                } else {

                    echo "Solo se permiten archivos de imagen JPG, JPEG, PNG o GIF.";
                }
            }


            $tabla = "programaciones_tv";

            $datos = array(
                "id_conductor" => $_POST["id_conductor"],
                "dia" => $_POST["dia"],
                "titulo" => $_POST["titulo"],
                "imagen" => $ruta_imagen,
                "hora" => $_POST["hora"]
            );

            $respuesta = ModeloProgramacionTV::mdlIngresarProgramacionTV($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡La programación fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "programacionTV";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR PROGRAMACION TV
    ============================= */

    static public function ctrEditarProgramacionTV()
    {

        if (isset($_POST["id_tv"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/programacionTV/";

            $ruta_imagen = $_POST["imagenActualTV"];

            if (isset($_FILES["editImagenTV"]["tmp_name"]) && !empty($_FILES["editImagenTV"]["tmp_name"])) {

                if (file_exists($ruta_imagen)) {
                    unlink($ruta_imagen);
                }

                $extension = pathinfo($_FILES["editImagenTV"]["name"], PATHINFO_EXTENSION);

                $tipos_permitidos = array("jpg", "jpeg", "png", "gif");

                if (in_array(strtolower($extension), $tipos_permitidos)) {

                    $nombre_imagen = date("YmdHis") . rand(1000, 9999);

                    $ruta_imagen = $ruta . $nombre_imagen . "." . $extension;

                    if (move_uploaded_file($_FILES["editImagenTV"]["tmp_name"], $ruta_imagen)) {

                        echo "Imagen subida correctamente.";
                    } else {

                        echo "Error al subir la imagen.";
                    }
                } else {

                    echo "Solo se permiten archivos de imagen JPG, JPEG, PNG o GIF.";
                }
            }


            $tabla = "programaciones_tv";


            $datos = array(
                "id_tv" => $_POST["id_tv"],
                "id_conductor" => $_POST["editId_conductor"],
                "dia" => $_POST["editDia"],
                "titulo" => $_POST["editTitulo"],
                "imagen" => $ruta_imagen,
                "hora" => $_POST["editHora"]
            );

            $respuesta = ModeloProgramacionTV::mdlEditarProgramacionTV($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La noticia fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "programacionTV";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR PROGRAMACION TV
    ========================== */

    static public function ctrBorrarProgramacionTV(){

		if(isset($_GET["idTV"])){

			$tabla ="programaciones_tv";
			$datos = $_GET["idTV"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloProgramacionTV::mdlBorrarProgramacionTV($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "La programación ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "programacionTV";

								}
							})

				</script>';

			}		

		}

	}
}
