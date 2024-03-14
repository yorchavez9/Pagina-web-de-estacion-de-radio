<?php

require_once "Conexion.php";

class ModeloMensaje
{

    /* ==========================
    MOSTRAR MENSAJE
    ========================== */

    static public function mdlMostrarMensaje($tabla, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tabla ORDER BY id_contacto DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR MENSAJE
    ========================== */

    static public function mdlIngresarMensaje($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                nombre, 
                                                                correo, 
                                                                telefono, 
                                                                compania, 
                                                                mensaje
                                                                ) 
                                                            VALUES(
                                                                :nombre,
                                                                :correo, 
                                                                :telefono, 
                                                                :compania, 
                                                                :mensaje)"
                                                                );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);    
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);    
        $stmt->bindParam(":compania", $datos["compania"], PDO::PARAM_STR);    
        $stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);    

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR MENSAJE
    ========================== */

    static public function mdlActualizarMensaje($tabla, $item1, $valor1, $item2, $valor2)
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
    BORRAR MENSAJE
    ========================== */

    static public function mdlBorrarMensaje($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_contacto = :id_contacto");

		$stmt -> bindParam(":id_contacto", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>