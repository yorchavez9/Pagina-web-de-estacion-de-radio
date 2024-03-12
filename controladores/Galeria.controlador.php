<?php

class ControladorGaleria
{

    /* ==========================
    MOSTRAR GALERIA
    ========================== */

    static public function ctrMostrarGaleria($item, $valor)
    {
        $tabla = "galarias";

        $respuesta = ModeloGaleria::mdlMostrarGaleria($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO GALERIA
    ============================= */

    static public function ctrCrearGaleria()
    {

        if (isset($_POST["tipo"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/galeria/";

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


            $tabla = "galarias";

            $datos = array(
                "tipo" => $_POST["tipo"],
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloGaleria::mdlIngresarGaleria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡La imagen fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "galerias";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR GALERIA
    ============================= */

    static public function ctrEditarGaleria()
    {

        if (isset($_POST["id_galeria"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/galeria/";

            $ruta_imagen = $_POST["imagenActualG"];

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


            $tabla = "galarias";


            $datos = array(
                "id_galeria" => $_POST["id_galeria"],
                "tipo" => $_POST["editTipo"],
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloGaleria::mdlEditarGaleria($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La imagen fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "galerias";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR GALERIA
    ========================== */

    static public function ctrBorrarGaleria(){

        if(isset($_GET["idGaleria"])){

			$tabla ="galarias";

			$datos = $_GET["idGaleria"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloGaleria::mdlBorrarGaleria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "La imagen ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "galerias";

								}
							})

				</script>';

			}		

		}
	}
}
