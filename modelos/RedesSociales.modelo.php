<?php

require_once "Conexion.php";

class ModeloRedesSociales
{

    /* ==========================
    MOSTRAR REDES SOCIALES
    ========================== */

    static public function mdlMostrarRedesSociales($tabla, $item, $valor)
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
    INGRESAR REDES SOCIALES
    ========================== */

    static public function mdlIngresarRedesSociales($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                facebook,
                                                                whatsapp, 
                                                                youtube,  
                                                                linkedin, 
                                                                twitter,
                                                                tiktok,
                                                                instagram
                                                                ) 
                                                            VALUES(
                                                                :facebook,
                                                                :whatsapp,
                                                                :youtube, 
                                                                :linkedin, 
                                                                :twitter,
                                                                :tiktok,
                                                                :instagram
                                                                )"
                                                                );

        $stmt->bindParam(":facebook", $datos["facebook"], PDO::PARAM_STR); 
        $stmt->bindParam(":whatsapp", $datos["whatsapp"], PDO::PARAM_STR);
        $stmt->bindParam(":youtube", $datos["youtube"], PDO::PARAM_STR);       
        $stmt->bindParam(":linkedin", $datos["linkedin"], PDO::PARAM_STR);    
        $stmt->bindParam(":twitter", $datos["twitter"], PDO::PARAM_STR);    
        $stmt->bindParam(":tiktok", $datos["tiktok"], PDO::PARAM_STR);    
        $stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);    

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR REDES SOCIALES
    ========================== */

    static public function mdlActualizarRedesSociales($tabla, $item1, $valor1, $item2, $valor2)
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
    EDITAR REDES SOCIALES
    ========================== */

    static public function mdlEditarRedesSociales($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                facebook = :facebook,
                                                                whatsapp = :whatsapp, 
                                                                youtube = :youtube, 
                                                                linkedin = :linkedin, 
                                                                twitter = :twitter,
                                                                tiktok = :tiktok,
                                                                instagram = :instagram
                                                            WHERE 
                                                                id_redes = :id_redes
                                                            ");

        $stmt->bindParam(":facebook", $datos["facebook"], PDO::PARAM_STR);
        $stmt->bindParam(":whatsapp", $datos["whatsapp"], PDO::PARAM_STR);
        $stmt->bindParam(":youtube", $datos["youtube"], PDO::PARAM_STR);
        $stmt->bindParam(":linkedin", $datos["linkedin"], PDO::PARAM_STR);
        $stmt->bindParam(":twitter", $datos["twitter"], PDO::PARAM_STR);
        $stmt->bindParam(":tiktok", $datos["tiktok"], PDO::PARAM_STR);
        $stmt->bindParam(":instagram", $datos["instagram"], PDO::PARAM_STR);
        $stmt->bindParam(":id_redes", $datos["id_redes"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR REDES SOIALES
    ========================== */

    static public function mdlBorrarRedesSociales($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_redes = :id_redes");

		$stmt -> bindParam(":id_redes", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>