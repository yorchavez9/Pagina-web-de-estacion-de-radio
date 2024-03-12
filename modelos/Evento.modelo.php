<?php

require_once "Conexion.php";

class ModeloEvento
{

    /* ==========================
    MOSTRAR EVENTO
    ========================== */

    static public function mdlMostrarEventos($tabla, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR EVENTO
    ========================== */

    static public function mdlIngresarEventos($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, imagen, fecha) VALUES(:titulo, :imagen, :fecha)");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR EVENTO
    ========================== */

    static public function mdlActualizarEvento($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR EVENTO
    ========================== */

    static public function mdlEditarEvento($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                titulo = :titulo,
                                                                imagen = :imagen,
                                                                fecha = :fecha,
                                                                descripcion = :descripcion
                                                            WHERE 
                                                                id_noticia = :id_noticia
                                                            ");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_noticia", $datos["id_noticia"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR EVENTO
    ========================== */

    static public function mdlBorrarEvento($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_noticia = :id_noticia");

		$stmt -> bindParam(":id_noticia", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>