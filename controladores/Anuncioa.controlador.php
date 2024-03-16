<?php

class ControladorAnuncioA
{

    /* ==========================
    MOSTRAR ANUNCIO A
    ========================== */

    static public function ctrMostrarAnuncioA($item, $valor)
    {
        $tabla = "anunciosa";

        $respuesta = ModeloAnuncioA::mdlMostrarAnuncioA($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO ANUNCIO A
    ============================= */

    static public function ctrCrearAnuncioA()
    {

        if (isset($_FILES["imagen"]["tmp_name"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/anuncioa/";

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


            $tabla = "anunciosa";

            $datos = array(
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloAnuncioA::mdlIngresarAnuncioA($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡El anuncio 1 fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "anuncioa";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR ANUNCIO A
    ============================= */

    static public function ctrEditarAnuncioA()
    {

        if (isset($_POST["id_anuncioA"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/anuncioa/";

            $ruta_imagen = $_POST["imagenActualAnuncioA"];

            if (isset($_FILES["editImagen"]["tmp_name"]) && !empty($_FILES["editImagen"]["tmp_name"])) {

                if (file_exists($ruta_imagen)) {
                    unlink($ruta_imagen);
                }

                $extension = pathinfo($_FILES["editImagen"]["name"], PATHINFO_EXTENSION);

                $tipos_permitidos = array("jpg", "jpeg", "png", "gif");

                if (in_array(strtolower($extension), $tipos_permitidos)) {

                    $nombre_imagen = date("YmdHis") . rand(1000, 9999);

                    $ruta_imagen = $ruta . $nombre_imagen . "." . $extension;

                    if (move_uploaded_file($_FILES["editImagen"]["tmp_name"], $ruta_imagen)) {

                        echo "Imagen subida correctamente.";
                    } else {

                        echo "Error al subir la imagen.";
                    }
                } else {

                    echo "Solo se permiten archivos de imagen JPG, JPEG, PNG o GIF.";
                }
            }


            $tabla = "anunciosa";


            $datos = array(
                "id_anuncioA" => $_POST["id_anuncioA"],
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloAnuncioA::mdlEditarAnuncioA($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡El anuncio 1 fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "anuncioa";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR ANUNCIO
    ========================== */

    static public function ctrBorrarAnuncioA(){

		if(isset($_GET["idAnuncioA"])){

			$tabla ="anunciosa";
			$datos = $_GET["idAnuncioA"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloAnuncioA::mdlBorrarAnuncioA($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El anuncio 1 ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "anuncioa";

								}
							})

				</script>';

			}		

		}

	}
}
