<?php

require_once "Conexion.php";

class ModeloSuscriptor
{

    /* ==========================
    MOSTRAR SUSCRIPTOR
    ========================== */

    static public function mdlMostrarSuscriptor($tabla, $item, $valor)
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
    INGRESAR SUSCRIPTOR
    ========================== */

    static public function mdlIngresarSuscriptor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(correo) VALUES(:correo)");

        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    BORRARO SUSCRIPTOR
    ========================== */

    static public function mdlBorrarSuscriptor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_suscribir = :id_suscribir");

		$stmt -> bindParam(":id_suscribir", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>