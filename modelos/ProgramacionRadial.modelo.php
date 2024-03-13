<?php

require_once "Conexion.php";

class ModeloProgramacionRadial
{

    /* ==========================
    MOSTRAR PROGRAMACION RADIAL
    ========================== */

    static public function mdlMostrarProgramacionRadial($tablaR, $tablaC, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tablaC INNER JOIN $tablaR ON $tablaC.id_conductor = $tablaR.id_conductor WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tablaC INNER JOIN $tablaR ON $tablaC.id_conductor = $tablaR.id_conductor ORDER BY id_radial DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR PROGRAMACION RADIAL
    ========================== */

    static public function mdlIngresarProgramacionRadial($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_conductor, dia, titulo, imagen, hora) VALUES(:id_conductor, :dia, :titulo, :imagen, :hora)");

        $stmt->bindParam(":id_conductor", $datos["id_conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR PROGRAMACION RADIAL
    ========================== */

    static public function mdlActualizarProgramacionRadial($tabla, $item1, $valor1, $item2, $valor2)
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
    EDITAR PROGRAMCION RADIAL
    ========================== */

    static public function mdlEditarProgramacionRadial($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                id_conductor = :id_conductor,
                                                                dia = :dia,
                                                                titulo = :titulo,
                                                                imagen = :imagen,
                                                                hora = :hora
                                                            WHERE 
                                                                id_radial = :id_radial
                                                            ");

        $stmt->bindParam(":id_conductor", $datos["id_conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":id_radial", $datos["id_radial"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR PROGRAMACION RADIAL
    ========================== */

    static public function mdlBorrarProgramacionRadial($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_radial = :id_radial");

		$stmt -> bindParam(":id_radial", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>