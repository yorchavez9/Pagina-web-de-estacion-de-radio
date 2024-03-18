<?php

require_once "Conexion.php";

class ModeloRanking
{

    /* ==========================
    MOSTRAR RANKING
    ========================== */

    static public function mdlMostrarRanking($tabla, $item, $valor)
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
    INGRESAR RANKING
    ========================== */

    static public function mdlIngresarRanking($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                puesto, 
                                                                cancion,
                                                                artista,
                                                                letra,
                                                                video_url
                                                                ) 
                                                            VALUES(
                                                                :puesto,
                                                                :cancion,
                                                                :artista,
                                                                :letra,
                                                                :video_url)"
                                                                );

        $stmt->bindParam(":puesto", $datos["puesto"], PDO::PARAM_INT);
        $stmt->bindParam(":cancion", $datos["cancion"], PDO::PARAM_STR);    
        $stmt->bindParam(":artista", $datos["artista"], PDO::PARAM_STR);    
        $stmt->bindParam(":letra", $datos["letra"], PDO::PARAM_STR);    
        $stmt->bindParam(":video_url", $datos["video_url"], PDO::PARAM_STR);    
  

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }


    /* ==========================
    EDITAR RANKING
    ========================== */

    static public function mdlEditarRanking($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                puesto = :puesto, 
                                                                cancion = :cancion,
                                                                artista = :artista,
                                                                letra = :letra,
                                                                video_url = :video_url
                                                            WHERE 
                                                                id_ranking = :id_ranking
                                                            ");

        $stmt->bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
        $stmt->bindParam(":cancion", $datos["cancion"], PDO::PARAM_STR);
        $stmt->bindParam(":artista", $datos["artista"], PDO::PARAM_STR);
        $stmt->bindParam(":letra", $datos["letra"], PDO::PARAM_STR);
        $stmt->bindParam(":video_url", $datos["video_url"], PDO::PARAM_STR);
        $stmt->bindParam(":id_ranking", $datos["id_ranking"], PDO::PARAM_INT);

 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR RANKING
    ========================== */

    static public function mdlBorrarRanking($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_ranking = :id_ranking");

		$stmt -> bindParam(":id_ranking", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>
