<?php

class ControladorAnuncioB
{

    /* ==========================
    MOSTRAR ANUNCIO B
    ========================== */

    static public function ctrMostrarAnuncioB($item, $valor)
    {
        $tabla = "anunciosb";

        $respuesta = ModeloAnuncioB::mdlMostrarAnuncioB($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO ANUNCIO B
    ============================= */

    static public function ctrCrearAnuncioB()
    {

        if (isset($_FILES["imagen"]["tmp_name"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/anunciob/";

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


            $tabla = "anunciosb";

            $datos = array(
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloAnuncioB::mdlIngresarAnuncioB($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡El anuncio 1 fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "anunciob";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR ANUNCIO B
    ============================= */

    static public function ctrEditarAnuncioB()
    {

        if (isset($_POST["id_anuncioB"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/anunciob/";

            $ruta_imagen = $_POST["imagenActualAnuncioB"];

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


            $tabla = "anunciosb";


            $datos = array(
                "id_anuncioB" => $_POST["id_anuncioB"],
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloAnuncioB::mdlEditarAnuncioB($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡El anuncio 2 fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "anunciob";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR ANUNCIO
    ========================== */

    static public function ctrBorrarAnuncioB(){

		if(isset($_GET["idAnuncioB"])){

			$tabla ="anunciosb";
			$datos = $_GET["idAnuncioB"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloAnuncioB::mdlBorrarAnuncioB($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El anuncio 2 ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "anunciob";

								}
							})

				</script>';

			}		

		}

	}
}
