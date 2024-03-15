<?php

class ControladorBanner
{

    /* ==========================
    MOSTRAR BANNER
    ========================== */

    static public function ctrMostrarBanners($item, $valor, $tipo)
    {
        $tabla = "banners";

        $respuesta = ModeloBanner::mdlMostrarBanners($tabla, $item, $valor, $tipo);

        return $respuesta;
    }

    /* =============================
    REGISTRO BANNER
    ============================= */

    static public function ctrCrearBanner()
    {

        if (isset($_FILES["imagen"]["tmp_name"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/banner/";

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


            $tabla = "banners";

            $datos = array(
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloBanner::mdlIngresarBanner($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡La imagen fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "banners";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR BANNER
    ============================= */

    static public function ctrEditarBanner()
    {

        if (isset($_POST["id_banner"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/banner/";

            $ruta_imagen = $_POST["imagenActual"];

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


            $tabla = "banners";


            $datos = array(
                "id_banner" => $_POST["id_banner"],
                "imagen" => $ruta_imagen
            );

            $respuesta = ModeloBanner::mdlEditarBanner($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La imagen fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "banners";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR BANNER
    ========================== */

    static public function ctrBorrarBanner(){

		if(isset($_GET["idBanner"])){

			$tabla ="banners";
			$datos = $_GET["idBanner"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloBanner::mdlBorrarBanner($tabla, $datos);

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

								window.location = "banners";

								}
							})

				</script>';

			}		

		}

	}
}
