<?php

require_once "Conexion.php";

class ModeloVideo
{

    /* ==========================
    MOSTRAR VIDEO
    ========================== */

    static public function mdlMostrarVideos($tabla, $item, $valor)
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
    INGRESAR VIDEO
    ========================== */

    static public function mdlIngresarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                titulo, 
                                                                video_url
                                                                ) 
                                                            VALUES(
                                                                :titulo,
                                                                :video_url)"
                                                                );

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":video_url", $datos["video_url"], PDO::PARAM_STR);    
  

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR VIDEO
    ========================== */

    static public function mdlActualizarVideo($tabla, $item1, $valor1, $item2, $valor2)
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
    EDITAR VIDEO
    ========================== */

    static public function mdlEditarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                titulo = :titulo, 
                                                                video_url = :video_url
                                                            WHERE 
                                                                id_video = :id_video
                                                            ");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":video_url", $datos["video_url"], PDO::PARAM_STR);
        $stmt->bindParam(":id_video", $datos["id_video"], PDO::PARAM_INT);

 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR VIDEO
    ========================== */

    static public function mdlBorrarVideo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_video = :id_video");

		$stmt -> bindParam(":id_video", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>
