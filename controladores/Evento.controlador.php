<?php

class ControladorEvento
{

    /* ==========================
    MOSTRAR EVENTOS
    ========================== */

    static public function ctrMostrarEvento($item, $valor)
    {
        $tabla = "eventos";

        $respuesta = ModeloEvento::mdlMostrarEventos($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================
    REGISTRO EVENTOS
    ============================= */

    static public function ctrCrearEvento()
    {

        if (isset($_POST["titulo"])) {

            /* ============================
                VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/eventos/";

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


            $tabla = "eventos";

            $datos = array(
                "titulo" => $_POST["titulo"],
                "imagen" => $ruta_imagen,
                "fecha" => $_POST["fecha"]            );

            $respuesta = ModeloEvento::mdlIngresarEventos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                            Swal.fire({
                                icon: "success",
                                title: "¡El evento fue guardado con éxito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "eventos";
                                }
                            });

                        </script>';
            }
        }
    }

    /* =============================
    EDITAR EVENTOS
    ============================= */

    static public function ctrEditarEvento()
    {

        if (isset($_POST["id_noticia"])) {

            /* ============================
            VALIDANDO IMAGEN
            ============================ */

            $ruta = "vistas/img/eventos/";

            $ruta_imagen = $_POST["imagenActualN"];

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


            $tabla = "noticias";


            $datos = array(
                "id_noticia" => $_POST["id_noticia"],
                "titulo" => $_POST["editTitulo"],
                "imagen" => $ruta_imagen,
                "fecha" => $_POST["editFecha"],
                "descripcion" => $_POST["editDescripcion"]
            );

            $respuesta = ModeloEvento::mdlEditarEvento($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        Swal.fire({
                              icon: "success",
                              title: "¡La noticia fue actualizado con éxito!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result) {
                                        if (result.value) {
    
                                        window.location = "noticias";
    
                                        }
                                    })
    
                        </script>';
            }
        }
    }

    /* ==========================
    BORRAR EVENTOS
    ========================== */

    static public function ctrBorrarEvento(){

		if(isset($_GET["idNoticia"])){

			$tabla ="noticias";
			$datos = $_GET["idNoticia"];

			if($_GET["imagen"] != ""){

				unlink($_GET["imagen"]);
				rmdir($_GET["imagen"]);

			}

			$respuesta = ModeloEvento::mdlBorrarEvento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "La noticia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "noticias";

								}
							})

				</script>';

			}		

		}

	}
}
