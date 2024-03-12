<?php

require_once "Conexion.php";

class ModeloConductor
{

    /* ==========================
    MOSTRAR CONDUCTOR
    ========================== */

    static public function mdlMostrarConductores($tabla, $item, $valor)
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
    INGRESAR CONDUCTOR
    ========================== */

    static public function mdlIngresarConductor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                nombre, 
                                                                apellidos, 
                                                                tipo, 
                                                                correo, 
                                                                telefono,
                                                                experiencia,
                                                                habilidad
                                                                ) 
                                                            VALUES(
                                                                :nombre,
                                                                :apellidos, 
                                                                :tipo, 
                                                                :correo, 
                                                                :telefono,
                                                                :experiencia,
                                                                :habilidad
                                                                )"
                                                                );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);    
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);    
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);    
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);    
        $stmt->bindParam(":experiencia", $datos["experiencia"], PDO::PARAM_STR);    
        $stmt->bindParam(":habilidad", $datos["habilidad"], PDO::PARAM_STR);    

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR CONDUCTOR
    ========================== */

    static public function mdlActualizarConductor($tabla, $item1, $valor1, $item2, $valor2)
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
    EDITAR CONDUCTORES
    ========================== */

    static public function mdlEditarConductor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                nombre = :nombre, 
                                                                apellidos = :apellidos, 
                                                                tipo = :tipo, 
                                                                correo = :correo, 
                                                                telefono = :telefono
                                                            WHERE 
                                                                id_usuario = :id_usuario
                                                            ");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR CONDUCTOR
    ========================== */

    static public function mdlBorrarConductor($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":id_usuario", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>