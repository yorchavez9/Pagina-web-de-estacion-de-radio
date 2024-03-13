<?php

class ControladorProgramacionRadial
{

    /* ==========================
    MOSTRAR PROGRAMACION RADIAL
    ========================== */

    static public function ctrMostrarProgramacionRadial($item, $valor)
    {
        $tablaR = "programaciones_radial";
        $tablaC = "conductores";

        $respuesta = ModeloProgramacionRadial::mdlMostrarProgramacionRadial($tablaR, $tablaC, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO PROGRAMACION RADIAL
    ============================= */

    static public function ctrCrearProgramacionRadial()
    {

        if (isset($_POST["id_conductor"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/programacionRadial/";

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


            $tabla = "programaciones_radial";

            $datos = array(
                "id_conductor" => $_POST["id_conductor"],
                "dia" => $_POST["dia"],
                "titulo" => $_POST["titulo"],
                "imagen" => $ruta_imagen,
                "hora" => $_POST["hora"]
            );

            $respuesta = ModeloProgramacionRadial::mdlIngresarProgramacionRadial($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡La programación fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "programacionRadial";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR PROGRAMACION RADIAL
    ============================= */

    static public function ctrEditarProgramacionRadial()
    {

        if (isset($_POST["id_radial"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/programacionRadial/";

            $ruta_imagen = $_POST["imagenActualRadial"];

            if (isset($_FILES["editImagenR"]["tmp_name"]) && !empty($_FILES["editImagenR"]["tmp_name"])) {

                if (file_exists($ruta_imagen)) {
                    unlink($ruta_imagen);
                }

                $extension = pathinfo($_FILES["editImagenR"]["name"], PATHINFO_EXTENSION);

                $tipos_permitidos = array("jpg", "jpeg", "png", "gif");

                if (in_array(strtolower($extension), $tipos_permitidos)) {

                    $nombre_imagen = date("YmdHis") . rand(1000, 9999);

                    $ruta_imagen = $ruta . $nombre_imagen . "." . $extension;

                    if (move_uploaded_file($_FILES["editImagenR"]["tmp_name"], $ruta_imagen)) {

                        echo "Imagen subida correctamente.";
                    } else {

                        echo "Error al subir la imagen.";
                    }
                } else {

                    echo "Solo se permiten archivos de imagen JPG, JPEG, PNG o GIF.";
                }
            }


            $tabla = "programaciones_radial";


            $datos = array(
                "id_radial" => $_POST["id_radial"],
                "id_conductor" => $_POST["editId_conductor"],
                "dia" => $_POST["editDia"],
                "titulo" => $_POST["editTitulo"],
                "imagen" => $ruta_imagen,
                "hora" => $_POST["editHora"]
            );

            $respuesta = ModeloProgramacionRadial::mdlEditarProgramacionRadial($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La noticia fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "programacionRadial";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR PROGRAMACION RADIAL
    ========================== */

    static public function ctrBorrarProgramacionRadial(){

		if(isset($_GET["idRadial"])){

			$tabla ="programaciones_radial";
			$datos = $_GET["idRadial"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloProgramacionRadial::mdlBorrarProgramacionRadial($tabla, $datos);

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

								window.location = "programacionRadial";

								}
							})

				</script>';

			}		

		}

	}
}
