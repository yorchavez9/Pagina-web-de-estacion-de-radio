<?php

require_once "Conexion.php";

class ModeloDatosContacto
{

    /* ==========================
    MOSTRAR DATOS DE CONTACTO
    ========================== */

    static public function mdlMostrarDatosContacto($tabla, $item, $valor)
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
    INGRESAR DATOS DE CONTACTO
    ========================== */

    static public function mdlIngresarDatosContacto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                localizacion,
                                                                telefono, 
                                                                correo
                                                                ) 
                                                            VALUES(
                                                                :localizacion,
                                                                :telefono,
                                                                :correo
                                                                )"
                                                                );

        $stmt->bindParam(":localizacion", $datos["localizacion"], PDO::PARAM_STR); 
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);       

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR DATOS DE CONTACTO
    ========================== */

    static public function mdlActualizarDatosContacto($tabla, $item1, $valor1, $item2, $valor2)
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
    EDITAR DATOS DE CONTACTO
    ========================== */

    static public function mdlEditarDatosContacto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                localizacion = :localizacion,
                                                                telefono = :telefono, 
                                                                correo = :correo
                                                            WHERE 
                                                                id_data_contacto = :id_data_contacto
                                                            ");

        $stmt->bindParam(":localizacion", $datos["localizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":id_data_contacto", $datos["id_data_contacto"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR DATOS DE CONTACTO
    ========================== */

    static public function mdlBorrarDatosContacto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_data_contacto = :id_data_contacto");

		$stmt -> bindParam(":id_data_contacto", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>